<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    public function client() {
        return $this -> belongsTo('App\Client', 'clients_id');
    }
}
