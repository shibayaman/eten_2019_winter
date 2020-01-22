<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Classという名前が問題でエラー出るので名前変えてます
class Classes extends Model
{
    protected $table = 'classes';
    public $timestamps = false;
    public $incrementing = false;

    public function owner() {
        return $this->hasMany('App\Owner');
    }
}
