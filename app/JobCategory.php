<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    public $timestamps = false;

    protected $table = "job_categories";

    public function clients() {
        return $this -> hasMany('App\Client', 'job_categories_id', 'id');
    }
}
