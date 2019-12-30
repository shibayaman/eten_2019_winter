<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Token extends Model
{
    protected $primaryKey = 'project_id';
    protected $guarded = [];

    public function updateToken() {
        $this->token = Str::random(16);
    }

    public function project() {
        return $this->belongsTo('App\Project');
    }
}
