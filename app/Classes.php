<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Classという名前が問題でエラー出るので名前変えてます
class Classes extends Model
{
    protected $table = classes;
    public $timestamps = false;

    public function season() {
        return $this->hasMany('App\Token');
    }
}
