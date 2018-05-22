<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatterDiscussion extends Model
{
    //
    protected $table = 'chatter_discussion';

    public function chattercategory()
    {
        return $this->belongsTo('App\ChatterCategory', 'chatter_category_id');
    }

    public function chatterposts()
    {
        return $this->hasMany('App\ChatterPost', 'chatter_discussion_id');
    }

    public function users()
    {
        return $this->belongsToMany('chatter_user_discussion', 'discussion_id', 'user_id');
    }
}
