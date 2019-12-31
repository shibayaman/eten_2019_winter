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
}
