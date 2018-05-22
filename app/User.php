<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Gstt\Achievements\Achiever;

class User extends Authenticatable
{
    use Notifiable;
    use Achiever;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function characters()
    {
        return $this->hasMany('App\Character');
    }

    public function chatterposts()
    {
        return $this->hasMany('App\ChatterPost');
    }

    public function chatterdiscussion()
    {
        return $this->hasMany('App\ChatterDiscussion');
    }

}
