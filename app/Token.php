<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $guarded = [];

    protected $hidden = ['token'];

    public function project() {
        return $this->hasOne('App\Project');
    }

    public function season(){
        return $this->belongsTo('App\Season');
    }

    public function class(){
        return $this->belongsTo('App\Classes');
    }
}
