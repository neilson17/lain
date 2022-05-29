<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Client;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $private = DB::table('notes as n')
            ->join('clients as c', 'n.clients_id', '=', 'c.id')
            ->where([['user_id', '=', Auth::user()->id], ['type', '=', 'private']])
            ->select('n.*', 'c.name')
            ->orderBy('n.date', 'DESC')
            ->get();

        $public = DB::table('notes as n')
            ->join('clients as c', 'n.clients_id', '=', 'c.id')
            ->where('type', '=', 'public')
            ->select('n.*', 'c.name')
            ->orderBy('n.date', 'DESC')
            ->get();

        return view('note.index', compact('public', 'private'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        return view('note.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $data = new Note();
        $data->title = $request->title;
        $data->content = $request->content;
        $data->date = $date;
        $data->type = $request->type;
        $data->clients_id = $request->clients_id;
        $data->user_id = Auth::user()->id;
        $data->save();
        return response()->json(['success'=>'Successfully added new note']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        $data = $note;
        $client = $data->client;
        return view('note.detail', compact('data', 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $data = $note;
        $client = Client::all();
        return view('note.edit', compact('data', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'noteid' => 'required',
            'title' => 'required',
            'type' => 'required',
            'clients_id' => 'required',
        ]);

        $note = Note::find($request->get('noteid'));
        $note->title = $request->get('title');
        $note->type = $request->get('type');
        $note->content = $request->get('content');
        $note->clients_id = $request->get('clients_id');
        $note->date = date("Y-m-d H:i:s", strtotime(now('Asia/Jakarta')->toDateTimeString()));
        $note->save();
        
        return response()->json(['success'=>"Successfully edited note"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        try{
            $note->delete();
            return redirect()->route('notes.index')->with('status',
            'Successfully deleted note!');
        }
        catch(\PDOException $e)
        {
            $msg = 'Failed to delete note!'. $e;
            return redirect()->route('events.index')->with('error', $msg);
        }
    }

    public function searchNote(Request $request)
    {
        $private = DB::table('notes as n')
            ->join('clients as c', 'n.clients_id', '=', 'c.id')
            ->where([['user_id', '=', Auth::user()->id], ['type', '=', 'private'], ['n.title', 'like', "%".$request->search."%"]])
            ->select('n.*', 'c.name')
            ->orderBy('n.date', 'DESC')
            ->get();

        $public = DB::table('notes as n')
            ->join('clients as c', 'n.clients_id', '=', 'c.id')
            ->where([['type', '=', 'public'], ['n.title', 'like', "%".$request->search."%"]])
            ->select('n.*', 'c.name')
            ->orderBy('n.date', 'DESC')
            ->get();

        $privateelements = "";
        $publicelements = "";

        foreach($private as $n) {
            $elements = '<a href="/notes/'.$n->id.'"><div class="card p-10x note-list-item"><div class="d-flex justify-content-space-between item-align-center"><div><h4>'.$n->title.'</h4>'.($n->clients_id != 1 ? '<p class="font-12x">'.$n->name.'</p>' : '').'</div><p class="font-12x text-align-right">'.$n->date.'</p></div><div class="divider mb-10x mt-10x"></div><p class="note-description-thumbnail font-12x">'.$n->content.'</p></div></a>';

            $privateelements .= $elements;
        }

        foreach($public as $n) {
            $elements = '<a href="/notes/'.$n->id.'"><div class="card p-10x note-list-item"><div class="d-flex justify-content-space-between item-align-center"><div><h4>'.$n->title.'</h4>'.($n->clients_id != 1 ? '<p class="font-12x">'.$n->name.'</p>' : '').'</div><p class="font-12x text-align-right">'.$n->date.'</p></div><div class="divider mb-10x mt-10x"></div><p class="note-description-thumbnail font-12x">'.$n->content.'</p></div></a>';

            $publicelements .= $elements;
        }

        return response()->json(['success'=>'Successfully searched notes', 'public'=>$publicelements, 'private'=>$privateelements]);
    }
}
