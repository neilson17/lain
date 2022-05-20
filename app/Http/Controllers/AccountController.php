<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Account::where('active', 1)->get();
        return view('team.index', compact('data'));
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
        $data->active = 1;
        $data->save();
        return redirect()->route('teams.index')->with('status', 'Successfully created new account!');
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
        return view('team.edit', compact('acc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account, $username)
    {
        $data = Account::find($username);
        $role = ['employee' => 'Employee', 'admin' => 'Admin'];
        // $role = ['employee', 'admin'];
        // dd($role);
        // $data = $account;
        // dd($data);
        return view('team.edit', compact('data', 'role'));
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
        $username = $request->get('username');
        $data = Account::find($username);
        $data->name = $request->get('name');
        $data->role = $request->get('role');
        $data->email = $request->get('email');
        $data->phone_number = $request->get('phone_number');
        $data->line = $request->get('line');
        $data->instagram = $request->get('instagram');
        $data->linkedin = $request->get('linkedin');
        $data->address = $request->get('address');

        if ($request->hasFile('image')) {
            File::delete($data->photo_url);
            $file = $request->file('image');
            $imgFolder = "assets/img";
            $imgFile = strtolower(str_replace(' ', '', ($data->username))).'.'.$file->getClientOriginalExtension();
            $file->move($imgFolder, $imgFile);
            $data->photo_url = $imgFile;
        }

        $data->save();

        return redirect()->route('teams.index')->with('status', 'Successfully edited account!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account, Request $request)
    {
        $account = Account::find($request->inpdelusername);
        $account->active = 0;
        $account->save();

        return redirect()->route('teams.index')->with('status',
            'Successfully deleted account!');
    }

    public function showSetting() {
        $data = Account::find("admin");
        return view('setting.index', compact('data'));
    }

    public function updateProfile(Request $request) {
        // $comp = strcmp($request->get('password'), $request->get('repeat_password'));
        if (strcmp($request->get('password'), $request->get('repeat_password')) == 0) {
            $data = Account::find("admin");
            
            $data->name = $request->get('name');
            $data->password = $request->get('password');
            $data->role = $request->get('role');
            $data->email = $request->get('email');
            $data->phone_number = $request->get('phone_number');
            $data->line = $request->get('line');
            $data->instagram = $request->get('instagram');
            $data->linkedin = $request->get('linkedin');
            $data->address = $request->get('address');
    
            if ($request->hasFile('image')) {
                File::delete($data->photo_url);
                $file = $request->file('image');
                $imgFolder = "assets/img";
                $imgFile = strtolower(str_replace(' ', '', ($data->username))).'.'.$file->getClientOriginalExtension();
                $file->move($imgFolder, $imgFile);
                $data->photo_url = $imgFile;
            }
    
            $data->save();
    
            return redirect()->action('AccountController@showSetting')->with('status', 'Successfully edited account!');
        }
        else {
            return redirect()->action('AccountController@showSetting')->with('error', 'Password is not the same');
        }
    }

    public function test($username, $password) {
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
        // $role = $account->role;
        // dd($account);
        if (count($account) == 0) return response()->json(array('status'=>'fail'));
        else {
            session()->put('activeUser', $username);
            session()->put('activeRole', $account[0]->role);
            session()->put('activePhoto', $account[0]->photo_url);
            
            return response()->json(array('status'=>'success'));
        }
    }

    public function logout() {
        session()->forget('activeUser');
        session()->forget('activeRole');
        session()->forget('activePhoto');
        return view('login.index');
    }

    public function showAccount(Request $request) {
        $account = Account::all();
        // $request->session()->forget('activeUser');
        $user = session()->get('activeUser');
        $role = session()->get('activeRole');
        // dd($user);
        // dd($account);
        dd($user);
    }

    public function searchTeam(Request $request)
    {
        $data = Account::where('name', 'like', "%".$request->search."%")->where('active', 1)->get();

        $elements = "";
        foreach($data as $a){
            $elements .= '<div class="card p-10x team-list-item mt-15x"><div class="d-flex flex-dir-col"><div class="d-flex item-align-center justify-content-space-between"><div class="d-flex item-align-center"><img class="img-avatar h-50x" src="https://i.pravatar.cc/300" alt=""><div class="ml-10x"><p class="dashboard-item-header">'.$a->name.'</p><p class="font-12x">'.$a->role.'</p></div></div><div><a class="btn btn-normal" href="/teams/'.$a->username.'/edit">Edit</a><a class="ml-10x btn btn-warning" href="">Delete</a></div></div><div class="divider mt-15x"></div><div class="d-flex flex-dir-col"><br><p class="font-12x text-align-center"><b>Address</b></p><p class="font-12x text-align-center">'.$a->address.'</p><br><div class="d-flex"><div class="w-50p d-flex justify-content-end"><div class="d-flex flex-dir-col"><p class="font-12x text-align-right"><b>Email</b></p><p class="font-12x text-align-right"><b>Phone</b></p></div><div class="d-flex flex-dir-col ml-10x"><p class="font-12x">'.$a->email.'</p><p class="font-12x">'.$a->phone_number.'</p></div></div><div class="w-50p d-flex ml-20x"><div class="d-flex flex-dir-col "><p class="font-12x text-align-right"><b>LINE</b></p><p class="font-12x text-align-right"><b>Instagram</b></p><p class="font-12x text-align-right"><b>LinkedIn</b></p></div><div class="d-flex flex-dir-col ml-10x"><p class="font-12x">'.$a->line.'</p><p class="font-12x">'.$a->instagram.'</p><p class="font-12x">'.$a->linkedin.'</p></div></div> </div></div></div></div>';
        }

        return response()->json(['success'=>'Successfully searched teams', 'elements'=>$elements]);
    }
}
