<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{


    //
    protected $table = 'characters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function quests()
    {
        return $this->belongsToMany('App\Quest');
    }


}
