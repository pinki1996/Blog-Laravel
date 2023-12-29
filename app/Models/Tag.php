<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function posts(){

        return $this->morphedByMany('App\Models\Post','taggable');

    }

    public function vedios(){

        return $this->morphedByMany('App\Models\Vedio','taggable');

    }
}
