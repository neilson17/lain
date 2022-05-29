<?php

namespace App\Http\Controllers;

use App\Account;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin-only');
        $data = User::where('active', 1)->get();
        return view('team.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin-only');
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
        $this->authorize('admin-only');
        $data = new User();
        $data->email = $request->get('username');
        $data->name = $request->get('name');
        $data->role = $request->get('role');
        $data->password = Hash::make($request->get('password'));
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
        // $acc = $account;
        // return view('team.edit', compact('acc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account, $id)
    {
        $this->authorize('admin-only');
        $data = User::find($id);
        $role = ['employee' => 'Employee', 'admin' => 'Admin'];
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
        $this->authorize('admin-only');
        $id = $request->get('id_user');
        $data = User::find($id);
        $data->name = $request->get('name');
        $data->role = $request->get('role');
        $data->email_email = $request->get('email');
        $data->phone_number = $request->get('phone_number');
        $data->line = $request->get('line');
        $data->instagram = $request->get('instagram');
        $data->linkedin = $request->get('linkedin');
        $data->address = $request->get('address');

        if ($request->hasFile('image')) {
            File::delete($data->photo_url);
            $file = $request->file('image');
            $imgFolder = "assets/img";
            $imgFile = strtolower(str_replace(' ', '', ($data->email))).'.'.$file->getClientOriginalExtension();
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
        $this->authorize('admin-only');
        $user = User::find($request->inpdelusername);
        $user->active = 0;
        $user->save();

        return redirect()->route('teams.index')->with('status',
            'Successfully deleted account!');
    }

    public function showSetting() {
        $data = User::find(Auth::user()->id);
        return view('setting.index', compact('data'));
    }

    public function updateProfile(Request $request) {
        if (strcmp($request->get('password'), $request->get('repeat_password')) == 0) {
            $data = User::find(Auth::user()->id);
            $data->name = $request->get('name');
            $pass = $request->get('password');
            if ($pass != "") {
                $data->password = Hash::make($pass);
            }
            $data->email_email = $request->get('email');
            $data->phone_number = $request->get('phone_number');
            $data->line = $request->get('line');
            $data->instagram = $request->get('instagram');
            $data->linkedin = $request->get('linkedin');
            $data->address = $request->get('address');
    
            if ($request->hasFile('image')) {
                File::delete($data->photo_url);
                $file = $request->file('image');
                $imgFolder = "assets/img";
                $imgFile = strtolower(str_replace(' ', '', ($data->email))).'.'.$file->getClientOriginalExtension();
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

    public function searchTeam(Request $request)
    {
        $this->authorize('admin-only');
        $data = User::where('name', 'like', "%".$request->search."%")->where('active', 1)->get();

        $elements = "";
        foreach($data as $a){
            $elements .= '<div class="card p-10x team-list-item mt-15x"><div class="d-flex flex-dir-col"><div class="d-flex item-align-center justify-content-space-between"><div class="d-flex item-align-center"><img class="img-avatar h-50x" src="assets/img/'.$a->photo_url.'" alt=""><div class="ml-10x"><p class="dashboard-item-header">'.$a->name.'</p><p class="font-12x">'.$a->role.'</p></div></div><div><a class="btn btn-normal" href="/teams/'.$a->id.'/edit">Edit</a><a class="ml-10x btn btn-warning" href="">Delete</a></div></div><div class="divider mt-15x"></div><div class="d-flex flex-dir-col"><br><p class="font-12x text-align-center"><b>Address</b></p><p class="font-12x text-align-center">'.$a->address.'</p><br><div class="d-flex"><div class="w-50p d-flex justify-content-end"><div class="d-flex flex-dir-col"><p class="font-12x text-align-right"><b>Email</b></p><p class="font-12x text-align-right"><b>Phone</b></p></div><div class="d-flex flex-dir-col ml-10x"><p class="font-12x">'.$a->email.'</p><p class="font-12x">'.$a->phone_number.'</p></div></div><div class="w-50p d-flex ml-20x"><div class="d-flex flex-dir-col "><p class="font-12x text-align-right"><b>LINE</b></p><p class="font-12x text-align-right"><b>Instagram</b></p><p class="font-12x text-align-right"><b>LinkedIn</b></p></div><div class="d-flex flex-dir-col ml-10x"><p class="font-12x">'.$a->line.'</p><p class="font-12x">'.$a->instagram.'</p><p class="font-12x">'.$a->linkedin.'</p></div></div> </div></div></div></div>';
        }

        return response()->json(['success'=>'Successfully searched teams', 'elements'=>$elements]);
    }
}
