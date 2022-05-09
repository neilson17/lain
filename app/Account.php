<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{ 
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function todos() {
        return $this->belongsToMany('App\ToDo', 'account_todo', 'account_username', 'todo_id');
    }
}
