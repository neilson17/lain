<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionCategory;
use App\BankAccount;
use App\Client;
use Illuminate\Http\Request;

class TransactionController extends Controller
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
        $this->authorize('admin-only');
        $trans_cat = TransactionCategory::all();
        $client = Client::all();
        $bank_acc = BankAccount::all();

        return view("transaction.add", compact("trans_cat", "client", "bank_acc"));
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
        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'clients_id' => 'required',
        ]);
        
        $bank_account = $request->bank_acc;
        $amounts = $request->amount;
        $category = $request->category_id;
        $bankAccount = BankAccount::where("id", "=", $bank_account)->get()[0];

        $transaction = new Transaction();
        $transaction->title = $request->title;
        $transaction->description = $request->description;
        $transaction->amount = $amounts;
        $transaction->date = date("Y-m-d H:i:s",strtotime($request->date));
        $transaction->bank_accounts_id = $bank_account;
        $transaction->clients_id = $request->clients_id;
        $transaction->transaction_categories_id = $category;

        if ($category == 1){
            $newBal = $bankAccount->balance + $amounts;
            $newAval = $bankAccount->available + $amounts;
            $bankAccount->balance = $newBal;
            $bankAccount->available = $newAval;
            $bankAccount->save();

            $transaction->save();
            return response()->json(['success'=>'success']);
        } 
        else if ($category == 2){
            $aval = $bankAccount->available;
            if ($aval >= $amounts){
                $newBal = $bankAccount->balance - $amounts;
                $newAval = $aval - $amounts;
                $bankAccount->balance = $newBal;
                $bankAccount->available = $newAval;
                $bankAccount->save();

                $transaction->save();
                return response()->json(['success'=>'success']);
            }
            else {
                return response()->json(['success'=>'insufficient']);
            }
        }
        else if ($category == 3 || $category == 4){
            $transaction->save();
            return response()->json(['success'=>'success']);
        }
        else {
            $transCategory = TransactionCategory::find($category);
            if ($transCategory->logic == "+"){
                $newBal = $bankAccount->balance + $amounts;
                $newAval = $bankAccount->available + $amounts;
                $bankAccount->balance = $newBal;
                $bankAccount->available = $newAval;
                $bankAccount->save();

                $transaction->save();
                return response()->json(['success'=>'success']);
            }
            else {
                $aval = $bankAccount->available;
                if ($aval >= $amounts){
                    $newBal = $bankAccount->balance - $amounts;
                    $newAval = $aval - $amounts;
                    $bankAccount->balance = $newBal;
                    $bankAccount->available = $newAval;
                    $bankAccount->save();

                    $transaction->save();
                    return response()->json(['success'=>'success']);
                }
                else {
                    return response()->json(['success'=>'insufficient']);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $this->authorize('admin-only');
        $data = $transaction;
        // $date = date("d M Y, H.i", strtotime($transaction->deadline));
        return view('transaction.detail', compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $this->authorize('admin-only');
        $client = Client::all();
        $data = $transaction;

        return view("transaction.edit", compact("data", "client"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $this->authorize('admin-only');
        $trans = Transaction::find($request->id);
        $bankAcc = BankAccount::find($request->bankAcc);
        $category = $request->category;

        $update = false;
        if ($category != 3 && $category != 4){
            $currBal = $bankAcc->balance;
            $currAval = $bankAcc->available;

            $transcat = TransactionCategory::find($trans->transaction_categories_id);
            if ($transcat->logic == "+"){
                $newBal = $currBal - $trans->amount + $request->amount;
                $newAval = $currAval - $trans->amount + $request->amount;
            }
            else {
                $newBal = $currBal + $trans->amount - $request->amount;
                $newAval = $currAval + $trans->amount - $request->amount;
            }
            
            if ($newBal >= 0 && $newAval >= 0){
                $bankAcc->balance = $newBal;
                $bankAcc->available = $newAval;
                $bankAcc->save();

                $update = true;
            }
        }
        else {
            $update = true;
        }

        if ($update == true){
            $trans->title = $request->title;
            $trans->description = $request->description;
            $trans->amount = $request->amount;
            $trans->date = date("Y-m-d H:i:s",strtotime($request->date));
            $trans->bank_accounts_id = $request->bankAcc;
            $trans->clients_id = $request->clients_id;
            $trans->save();

            return response()->json(['success'=>'success']);
        }
        else{
            return response()->json(['success'=>'insufficient']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $this->authorize('admin-only');
        $category = $transaction->transaction_categories_id;
        $bankAcc = BankAccount::find($transaction->bank_accounts_id);
        $update = false;
        if ($category != 3 && $category != 4){
            $currBal = $bankAcc->balance;
            $currAval = $bankAcc->available;

            $transcat = TransactionCategory::find($category);
            if ($transcat->logic == "+"){
                $newBal = $currBal - $transaction->amount;
                $newAval = $currAval - $transaction->amount;
            }
            else {
                $newBal = $currBal + $transaction->amount;
                $newAval = $currAval + $transaction->amount;
            }
            
            if ($newBal >= 0 && $newAval >= 0){
                $bankAcc->balance = $newBal;
                $bankAcc->available = $newAval;
                $bankAcc->save();

                $update = true;
            }
        }
        else {
            $update = true;
        }

        if ($update == true){
            try{
                $transaction->delete();
                return redirect()->route('finances.index')->with('statustrans',
                'Successfully deleted transaction!');
            }
            catch(\PDOException $e)
            {
                $msg = 'Failed to delete transaction!'. $e;
                return redirect()->route('finance.index')->with('errortrans', $msg);
            }
        }
        else{
            $msg = 'Insufficient Balance';
            return redirect()->route('finances.index')->with('errortrans', $msg);
        }
    }

    public function changeDonePiutang (Request $request){
        $this->authorize('admin-only');
        $trans = Transaction::find($request->id);
        $bankAcc = BankAccount::find($trans->bank_accounts_id);

        $newBal = $bankAcc->balance + $trans->amount;
        $newAval = $bankAcc->available + $trans->amount;

        $trans->transaction_categories_id = 1;
        date_default_timezone_set('Asia/Jakarta');
        $trans->date = date("Y-m-d H:i:s",strtotime(date("y-m-d h:i:s")));
        $trans->save();
        $bankAcc->balance = $newBal;
        $bankAcc->available = $newAval;
        $bankAcc->save();

        return response()->json(['success'=>'Successfully updated transaction']);
    }

    public function changeDoneHutang (Request $request){
        $this->authorize('admin-only');
        $trans = Transaction::find($request->id);
        $bankAcc = BankAccount::find($trans->bank_accounts_id);

        if ($bankAcc->available >= $trans->amount){
            $newBal = $bankAcc->balance - $trans->amount;
            $newAval = $bankAcc->available - $trans->amount;

            $trans->transaction_categories_id = 2;
            date_default_timezone_set('Asia/Jakarta');
            $trans->date = date("Y-m-d H:i:s",strtotime(date("y-m-d h:i:s")));
            $trans->save();
            $bankAcc->balance = $newBal;
            $bankAcc->available = $newAval;
            $bankAcc->save();

            return response()->json(['success'=>'success']);
        }
        else{
            return response()->json(['success'=>'insufficient']);
        }
    }
    
    public function financeReport(){
        $this->authorize('admin-only');
        $startDate = date("Y-m-d\TH:i",strtotime("-30 days"));
        $endDate = date("Y-m-d\TH:i",strtotime(date("y-m-d h:i:s")));
        $bankAcc = BankAccount::all();
        return view('transaction.report', compact("startDate", "endDate", "bankAcc"));
    }

    public function getReportsContent(Request $request){
        $this->authorize('admin-only');
        $trans = Transaction::where("bank_accounts_id", "=", $request->bankAcc)
            ->whereBetween('date', [date("Y-m-d H:i:s",strtotime($request->startDate)), date("Y-m-d H:i:s",strtotime($request->endDate))])
            ->orderBy('date', 'asc')
            ->get();

        $totalIncome = 0;
        $totalExpense = 0;
        $totalPiutang = 0;
        $totalHutang = 0;
        foreach ($trans as $t){
            if ($t->transaction_categories_id == 1) $totalIncome += $t->amount;
            else if ($t->transaction_categories_id == 2) $totalExpense += $t->amount;
            else if ($t->transaction_categories_id == 3) $totalPiutang += $t->amount;
            else if ($t->transaction_categories_id == 4) $totalHutang += $t->amount;
            else{
                $transCat = TransactionCategory::find($t->transaction_categories_id);
                if ($transCat->logic == "+") $totalBalance += $t->amount;
                else $totalBalance -= $t->amount;
            }
        }
        
        $totalBalance = $totalIncome - $totalExpense;
        return response()->json(array(
            'msg'=> view("transaction.reportContent", compact("trans"))->render(),
            'balance'=>$totalBalance,
            'income'=>$totalIncome,
            'expense'=>$totalExpense,
            'piutang'=>$totalPiutang,
            'hutang'=>$totalHutang
        ),200);
    }
}
