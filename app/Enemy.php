<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enemy extends Model
{
    //

    protected $table = 'enemies';

    public function quests()
    {
        return $this->hasMany('App\Quest');
    }

}
