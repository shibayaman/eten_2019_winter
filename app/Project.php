<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function token() {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
