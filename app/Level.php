<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //

    /**
     * @return Level|null
     */
    public function nextLevel()
    {
        return Level::query()->find($this->id + 1);
    }

    public function quests()
    {
        return $this->hasMany('App\Quest');
    }
}
