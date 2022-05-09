<?php

namespace App\Http\Controllers;

use App\Note;
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
        $user = session()->get('activeUser');
        $notes = DB::table('notes as n')
            ->join('clients as c', 'n.clients_id', '=', 'c.id')
            ->where('accounts_username', '=', $user)
            ->select('n.*', 'c.name')
            ->orderBy('n.date', 'DESC')
            ->get();

        $public = $private = [];

        foreach($notes as $n) {
            if ($n->type == "public") array_push($public, $n);
            else array_push($private, $n);
        }
        // dd($public);
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
        // $request->validate([
        //     'title' => 'required',
        //     'type' => 'required',
        //     'clients_id' => 'required',
        //     'content' => 'required',
        // ]);
        $user = session()->get('activeUser');
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $data = new Note();
        $data->title = $request->title;
        $data->content = $request->content;
        $data->date = $date;
        $data->type = $request->type;
        $data->clients_id = $request->clients_id;
        $data->accounts_username = $user;

        // dd($data);
        $data->save();
        
        // coba pake redirect route
        // redirect()->route('suppliers.index');
        // return redirect()->route('notes.index')->with('status', 'data baru berhasil tersimpan');
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

    public function showNote() {
        $user = session()->get('activeUser');
        $notes = DB::table('notes')->where('accounts_username', '=', $user)->get();

        $public = $private = [];

        foreach($notes as $n) {
            if ($n->type == "public") array_push($public, $n);
            else array_push($private, $n);
        }

        // $tz = 'Asia/Jakarta';
        // $dt = new DateTime("now", new DateTimeZone($tz));
        // $timestamp = $dt->format('Y-m-d G:i:s');
        // echo "WIB  : $timestamp \n";

        // echo "<pre>";
        // print_r($public);
        // echo "</pre>";

        // $privateNotes = DB::table('notes')
        dd($notes);
        // return view('note.index', compact('public', 'private'));
    }

    public function searchNote(Request $request)
    {
        $user = session()->get('activeUser');
        $notes = DB::table('notes as n')
            ->join('clients as c', 'n.clients_id', '=', 'c.id')
            ->where('accounts_username', '=', $user)
            ->select('n.*', 'c.name')
            ->where('n.title', 'like', "%".$request->search."%")
            ->orderBy('n.date', 'DESC')
            ->get();

        $privateelements = "";
        $publicelements = "";

        foreach($notes as $n) {
            $elements = '<a href="/notes/'.$n->id.'"><div class="card p-10x note-list-item"><div class="d-flex justify-content-space-between item-align-center"><div><h4>'.$n->title.'</h4>'.($n->clients_id != 1 ? '<p class="font-12x">{{ $note->name }}</p>' : '').'</div><p class="font-12x text-align-right">'.$n->date.'</p></div><div class="divider mb-10x mt-10x"></div><p class="note-description-thumbnail font-12x">'.$n->content.'</p></div></a>';

            if ($n->type == "public") $publicelements .= $elements;
            else $privateelements .= $elements;
        }

        return response()->json(['success'=>'Successfully searched notes', 'public'=>$publicelements, 'private'=>$privateelements]);
    }
}
