<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_code',
        'class_id',
        'year',
        'season_id'
    ];

    public function token() {
        return $this->hasOne('App\Token');
    }
}
