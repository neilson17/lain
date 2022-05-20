<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use DB;
use App\JobCategory;
use App\Todo;
use App\Account;
use App\Event;
use App\Note;
use Illuminate\Support\Facades\File; 

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Client::find(2);
        // $todo = Todo::where([['clients_id', '=', $data->id], ['done', '=', '0']])->count();
        // dd($todo);
 
        $client = Client::where('id', '<>', 1)->orderBy('deadline')->get();
        $data = [];
        foreach($client as $d) {
            $date = date("d M Y, H.i", strtotime($d->deadline));
            $tt = Todo::where('clients_id', '=', $d->id)->count();
            $td = Todo::where([['clients_id', '=', $d->id], ['done', '=', 1]])->count();
            $percentage = ($tt != 0) ? round(($td/$tt), 2) : 0;

            $temp = array("data" => $d, "totalTask" => $tt, "taskDone" => $td, "formatted_date" => $date, "percentage" => $percentage);
            array_push($data, $temp);
        }
        // dd($data);

        return view('client.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_categories = JobCategory::all();
        // dd($job_categories);
        return view('client.add', compact('job_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->get('inpclientname');
        $client->description = $request->get('inpclientdescription');
        $client->email = $request->get('inpclientemail');
        $client->phone_number = $request->get('inpclientphonenumber');
        $client->instagram = $request->get('inpclientinstagram');
        $client->link = $request->get('inpclientlinkedin');
        $client->status = "in progress";
        $client->deadline = date("Y-m-d H:i:s",strtotime($request->get('inpclientdeadline')));
        $client->job_categories_id = $request->get('job_categories_id');
        
        $file = $request->file('inpclientphotourl');
        $imgFolder = "assets/img";
        $imgFile = strtolower(str_replace(' ', '', ($client->name))).'.'.$file->getClientOriginalExtension();
        $file->move($imgFolder, $imgFile);
        $client->photo_url = $imgFile;

        $client->save();

        return redirect()->route('clients.index')->with('status', 'Successfully added new client!');
        // return response()->json(['success'=>'Successfully added new client']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $tt = Todo::where('clients_id', '=', $client->id)->count();
        $td = Todo::where([['clients_id', '=', $client->id], ['done', '=', 1]])->count();
        $percentage = ($tt != 0) ? round(($td/$tt), 2) : 0;
        $data = $client;
        $date = date("d M Y, H.i", strtotime($client->deadline));
        $todos = Todo::where('clients_id', '=', $client->id)
            ->where('done', 0)
            ->orderBy('deadline')
            ->get();

        $todos_unfiltered = Todo::where('clients_id', '=', $client->id)->get();
        $accounts = [];
        foreach($todos_unfiltered as $d) {
            $account = $d->accounts;
            foreach($account as $a) {
                array_push($accounts, $a->username);
            }
        }
        $collaborators = Account::find(array_unique($accounts));
        // dd($collaborators);

        $events = Event::where('clients_id', '=', $data->id)
            ->where('date', '>=', DB::raw('curdate()'))
            ->orderBy('date')
            ->get();

        $notes = DB::table('notes as n')->join('clients as c', 'n.clients_id', '=', 'c.id')->where([['accounts_username', '=', 'admin'], ['clients_id', '=', $data->id]])->select('n.*', 'c.name')->get();

        $public = $private = [];

        foreach($notes as $n) {
            if ($n->type == "public") array_push($public, $n);
            else array_push($private, $n);
        }

        return view('client.detail', compact('data', 'date', 'tt', 'td', 'percentage', 'collaborators', 'events', 'todos', 'public', 'private'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $data = $client;
        $deadline = date("Y-m-d\TH:i",strtotime($data->deadline));
        return view('client.edit', compact('data', 'deadline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->get('name');
        $client->description = $request->get('description');
        $client->deadline = date("Y-m-d H:i:s",strtotime($request->get('deadline')));
        $client->email = $request->get('email');
        $client->phone_number = $request->get('phone_number');
        $client->instagram = $request->get('instagram');
        $client->link = $request->get('linkedin');

        if ($request->hasFile('image')) {
            File::delete($client->photo_url);
            $file = $request->file('image');
            $imgFolder = "assets/img";
            $imgFile = strtolower(str_replace(' ', '', ($client->name))).'.'.$file->getClientOriginalExtension();
            $file->move($imgFolder, $imgFile);
            $client->photo_url = $imgFile;
        }

        $client->save();

        return redirect()->route('clients.index')->with('status', 'Successfully edited client!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        try{
            $todos = Todo::where('clients_id', $client->id)->get();
            foreach($todos as $t){
                $t->accounts()->detach();
                $t->tags()->detach();
                $t->delete();
            }

            $events = Event::where('clients_id', $client->id)->get();
            foreach($events as $e){
                $e->delete();
            }

            $notes = Note::where('clients_id', $client->id)->get();
            foreach($notes as $n){
                // Kalo note yang private bakal diganti ke clients_id = 1
                if ($n->type == "private"){
                    $n->clients_id = 1;
                    $n->save();
                }
                else{
                    $n->delete();
                }
            }

            $client->delete();

            return redirect()->route('clients.index')->with('deletesuccess',
            'Successfully deleted client!');
        }
        catch(\PDOException $e)
        {
            $msg = 'Failed to delete client!'. $e;
            return redirect()->route('clients.index')->with('deleteerror', $msg);
        }
    }

    public function searchClient(Request $request)
    {
        $client = Client::where('name', 'like', "%".$request->search."%")
            ->orderBy('deadline')
            ->get();
        $elements = "";
        foreach($client as $d) {
            $date = date("d M Y, H.i", strtotime($d->deadline));
            $tt = Todo::where('clients_id', '=', $d->id)->count();
            $td = Todo::where([['clients_id', '=', $d->id], ['done', '=', 1]])->count();
            if ($tt != 0) $percentage = round(($td/$tt) * 100, 2);
            else $percentage = 0;

            $elements .= '<a href="/clients/'.$d->id.'"><div class="card p-10x client-list-item mt-15x dashboard-list-item d-flex"><div class="d-flex w-70p item-align-center"><img class="img-avatar h-40x" src="'.asset('assets/img/'.$d->photo_url).'" alt=""><div class="ml-10x mr-10x w-100p"><div class="d-flex item-align-end"><p class="dashboard-item-header">'.$d->name.'</p><p class="font-12x ml-5x">'.$d->job_category->name.'</p></div><progress class="w-80p" id="progressclientdashboard" value="'.($tt != 0 ? $td / $tt * 100 : 0).'" max="100"></progress><label for="progressclientdashboard" class="ml-5x font-14x">'.$percentage.'%</label><p class="font-12x">Task Done: '.$td.'/'.$tt.'</p></div></div><p class="font-12x text-align-right">Due '.$date.'</p> </div></a>';
        }

        return response()->json(['success'=>'Successfully searched client', 'elements'=>$elements]);
    }

    public function rangeEvent(Request $request){
        $client = Client::find($request->client_id);
        $range = $request->range;

        if ($range == 100){
            $events = Event::where('clients_id', '=', $client->id)
                ->where('date', '>=', DB::raw('curdate()'))
                ->orderBy('date')
                ->get();
        }
        else if ($range == 200){
            $events = Event::where('clients_id', '=', $client->id)
                ->orderBy('date')
                ->get();
        }
        else {
            $events = Event::where('clients_id', '=', $client->id)
                ->whereBetween('date', [DB::raw('curdate()'), DB::raw('date_add(curdate(), interval '.$request->range.' day)')])
                ->orderBy('date')
                ->get();
        }

        $elements = "";
        foreach($events as $e){
            $elements .= '<a href="/events/'.$e->id.'"><div class="dashboard-list-item d-flex"><div class="d-flex"><div class="ml-10x"><p class="dashboard-item-header">'.$e->title.'</p></div></div><p class="font-12x text-align-right">Due '.$e->date.'</p></div></a><div class="divider"></div>';
        }

        return response()->json(['success'=>'Successfully updated range on events', 'elements'=>$elements]);
    }

    public function rangeTodo(Request $request){
        $client = Client::find($request->client_id);
        $range = $request->range;

        if ($range == 100){
            $todos = Todo::where('clients_id', '=', $client->id)
                ->where('deadline', '>=', DB::raw('curdate()'))
                ->orderBy('deadline')
                ->get();
        }
        else if ($range == 200){
            $todos = Todo::where('clients_id', '=', $client->id)
                ->where('done', 0)
                ->orderBy('deadline')
                ->get();
        }
        else if ($range == 300){
            $todos = Todo::where('clients_id', '=', $client->id)
                ->orderBy('deadline')
                ->get();
        }
        else {
            $todos = Todo::where('clients_id', '=', $client->id)
                ->whereBetween('deadline', [DB::raw('curdate()'), DB::raw('date_add(curdate(), interval '.$request->range.' day)')])
                ->orderBy('deadline')
                ->get();
        }

        $elements = "";
        foreach($todos as $t){
            $elements .= '<a href="/todos/'.$t->id.'"><div class="dashboard-list-item d-flex"><div class="d-flex item-align-center w-70p"><input id="'.$t->id.'" class="done-todo-client-detail" type="checkbox" '.($t->done == 1 ? 'checked': '').'><div class="ml-10x"><p class="dashboard-item-header">'.$t->name.'</p></div> </div><div class="w-30p"><p class="font-12x text-align-right">Due '.$t->deadline.'</p></div></div></a><div class="divider"></div>';
        }

        return response()->json(['success'=>'Successfully updated range on todos', 'elements'=>$elements]);
    }

    public function showClient() {
        $client = Client::all();
        dd($client);
    }
}
