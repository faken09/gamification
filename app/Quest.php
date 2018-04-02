<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    //

    protected $table = 'quests';


    public function Enemy()
    {
        return $this->belongsTo('App\enemy');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }


}
