<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    public $timestamps = false;

    public function transactions() {
        return $this -> hasMany('App\Transaction', 'bank_accounts_id', 'id');
    }
}
