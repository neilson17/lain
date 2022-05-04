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
        return $this -> hasMany('App\Todo', 'clients_id', 'id');
    }

    public function job_category() {
        return $this -> belongsTo('App\JobCategory', 'job_categories_id');
    }

    public function events() {
        return $this -> hasMany('App\Todo', 'clients_id', 'id');
    }
}
