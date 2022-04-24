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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
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

    public function testpost(Request $request) {
        $username = $request->username;
        $password = $request->password;
        console.log($username);
        // return response()->json(array(
        //     'msg' => $username
        // ), 200);
    }
}
