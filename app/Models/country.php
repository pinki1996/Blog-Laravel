<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    //

    public function posts(){

        return $this->hasManyThrough('App\Models\Post','App\Models\User','country_id');

    }
}
