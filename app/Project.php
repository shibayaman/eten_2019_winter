<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function owner() {
        return $this->belongsTo('App\Owner');
    }
}
