<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Owner extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

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
