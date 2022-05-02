<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    public $timestamps = false;

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function accounts() {
        return $this->belongsToMany('App\Account');
    }

    public function client() {
        return $this -> belongsTo('App\Client', 'clients_id');
    }
}
