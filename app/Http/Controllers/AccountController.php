<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Account::all();
        return view('team.index', compact('data'));
        // dd($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Account();
        $data->username = $request->get('username');
        $data->name = $request->get('name');
        $data->role = $request->get('role');
        $data->photo_url = "default.jpg";
        $data->save();
        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        $acc = $account;
        dd($acc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        dd($account);
        // return view('team.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }

    public function test($username, $password) {
        // public function test() {
        $result=Account::where([
            ['username', '=', $username], 
            ['password', '=', $password]
        ])->get();
        // dd($result);
        $res = "NO";
        if (count($result) != 0) {
            $res = "YES";
        }
        return response()->json(array('status'=>'oke', 'res' => $res), 200);
        // return response()->json(array('status'=>'oke', 'msg'=>$result->username, 'res' => $res), 200);
    }

    public function login(Request $request) {
        $username = $request->username;
        $password = $request->password;

        $account=Account::where([
            ['username', '=', $username], 
            ['password', '=', $password]
        ])->get();

        if (count($account) == 0) return response()->json(array('status'=>'fail'));
        else return response()->json(array('status'=>'success'));
    }

    public function showAccount() {
        $account = Account::all();
        dd($account);
    }

    public function searchTeam(Request $request)
    {
        $data = Account::where('name', 'like', "%".$request->search."%")->get();

        $elements = "";
        foreach($data as $a){
            $elements .= '<div class="card p-10x team-list-item mt-15x"><div class="d-flex flex-dir-col"><div class="d-flex item-align-center justify-content-space-between"><div class="d-flex item-align-center"><img class="img-avatar h-50x" src="https://i.pravatar.cc/300" alt=""><div class="ml-10x"><p class="dashboard-item-header">'.$a->name.'</p><p class="font-12x">'.$a->role.'</p></div></div><div><a class="btn btn-normal" href="/teams/'.$a->username.'/edit">Edit</a><a class="ml-10x btn btn-warning" href="">Delete</a></div></div><div class="divider mt-15x"></div><div class="d-flex flex-dir-col"><br><p class="font-12x text-align-center"><b>Address</b></p><p class="font-12x text-align-center">'.$a->address.'</p><br><div class="d-flex"><div class="w-50p d-flex justify-content-end"><div class="d-flex flex-dir-col"><p class="font-12x text-align-right"><b>Email</b></p><p class="font-12x text-align-right"><b>Phone</b></p></div><div class="d-flex flex-dir-col ml-10x"><p class="font-12x">'.$a->email.'</p><p class="font-12x">'.$a->phone_number.'</p></div></div><div class="w-50p d-flex ml-20x"><div class="d-flex flex-dir-col "><p class="font-12x text-align-right"><b>LINE</b></p><p class="font-12x text-align-right"><b>Instagram</b></p><p class="font-12x text-align-right"><b>LinkedIn</b></p></div><div class="d-flex flex-dir-col ml-10x"><p class="font-12x">'.$a->line.'</p><p class="font-12x">'.$a->instagram.'</p><p class="font-12x">'.$a->linkedin.'</p></div></div> </div></div></div></div>';
        }

        return response()->json(['success'=>'Successfully searched teams', 'elements'=>$elements]);
    }
}
