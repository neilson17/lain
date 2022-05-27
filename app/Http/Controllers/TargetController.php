<?php

namespace App\Http\Controllers;

use App\Target;
use App\Transaction;
use App\BankAccount;
use Illuminate\Http\Request;

class TargetController extends Controller
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
        return view('target.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'amount' => 'required',
        ]);

        $data = new Target();
        $data->name = $request->title;
        $data->date = date("Y-m-d H:i:s",strtotime($request->date));
        $data->description = $request->description;
        $data->target_amount = $request->amount;
        $data->current_amount = 0;
        $data->done = 0;
        $data->save();

        return response()->json(['success'=>'Successfully added new target']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function show(Target $target)
    {
        $data = $target;
        return view('target.detail', compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function edit(Target $target)
    {
        $data = $target;
        $bankAcc = BankAccount::find(1);
        $avalBal = $target->current_amount + $bankAcc->available;
        return view('target.edit', compact("data", "avalBal"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Target $target)
    {
        $target = Target::find($request->id);
        $bankAcc = BankAccount::find(1);
        $newAval = $bankAcc->available + $target->current_amount - $request->current_amount;
        $bankAcc->available = $newAval;
        $bankAcc->save();

        $target->name = $request->name;
        $target->current_amount = $request->current_amount;
        $target->target_amount = $request->target_amount;
        $target->date = date("Y-m-d H:i:s",strtotime($request->date));
        $target->description = $request->description;
        $target->save();

        return response()->json(['success'=>'Successfully updated target']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target $target)
    {
        try{
            $target->delete();
            return redirect()->route('finances.index')->with('statustarget',
            'Successfully deleted target!');
        }
        catch(\PDOException $e)
        {
            $msg = 'Failed to delete target!'. $e;
            return redirect()->route('finances.index')->with('errortarget', $msg);
        }
    }

    public function changeDone(Request $request){
        $target = Target::find($request->id);
        
        if ($target->current_amount == $target->target_amount){
            $target->done = 1;
            $target->save();

            $bankAccount = BankAccount::find(1);
            $newBal = $bankAccount->balance - $target->target_amount;
            $bankAccount->balance = $newBal;
            $bankAccount->save();

            $transaction = new Transaction();
            $transaction->title = $target->name;
            $transaction->description = $target->description;
            $transaction->amount = $target->target_amount;
            date_default_timezone_set('Asia/Jakarta');
            $transaction->date = date("Y-m-d H:i:s",strtotime(date("y-m-d h:i:s")));
            $transaction->bank_accounts_id = 1;
            $transaction->clients_id = 1;
            $transaction->transaction_categories_id = 2;
            $transaction->save();

            return response()->json(['success'=>'success']);
        }
        else{
            return response()->json(['success'=>'insufficient']);
        }
    }
}
