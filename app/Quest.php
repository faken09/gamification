<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    //

    protected $table = 'quests';


    public function level()
    {
        return $this->belongsTo('App\Level');
    }


    public function user()
    {
        return $this->belongsToMany('App\User', 'users_quests_pivot', 'user_id', 'quest_id');
    }


}
