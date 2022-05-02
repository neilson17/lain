<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    public function notes() {
        return $this -> hasMany('App\Note', 'clients_id', 'id');
    }

    public function todos() {
        return $this -> hasMany('App\ToDo', 'clients_id', 'id');
    }
}
