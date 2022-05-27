<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;

    public function transaction_category() {
        return $this -> belongsTo('App\TransactionCategory', 'transaction_categories_id');
    }

    public function bank_account() {
        return $this -> belongsTo('App\BankAccount', 'bank_accounts_id');
    }

    public function client() {
        return $this -> belongsTo('App\Client', 'clients_id');
    }
}
