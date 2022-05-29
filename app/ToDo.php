<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $timestamps = false;

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function accounts() {
        return $this->belongsToMany('App\Account', 'account_todo', 'todo_id', 'account_username');
    }

    public function client() {
        return $this -> belongsTo('App\Client', 'clients_id');
    }
    
    public function users() {
        return $this->belongsToMany('App\User', 'account_todo', 'todo_id', 'user_id');
    }
}
