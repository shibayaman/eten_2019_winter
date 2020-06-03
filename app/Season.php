<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public $timestamps = false;

    public function season()
    {
        return $this->hasMany('App\Owner');
    }
}
