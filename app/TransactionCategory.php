<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    public $timestamps = false;

    public function transactions() {
        return $this -> hasMany('App\Transaction', 'transaction_categories_id', 'id');
    }
}
