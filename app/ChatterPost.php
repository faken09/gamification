<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatterPost extends Model
{
    //
    protected $table = 'chatter_post';

    public function chatterdiscussion()
    {
        return $this->belongsTo('App\ChatterDiscussion', 'chatter_discussion_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
