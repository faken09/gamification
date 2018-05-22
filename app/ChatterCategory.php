<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatterCategory extends Model
{
    //
    protected $table = 'chatter_categories';

    public function chatterdiscussion()
    {
        return $this->hasMany('App\ChatterDiscussion', 'chatter_category_id');
    }


    public function chattercategory()
    {
        return $this->belongsTo('App\ChatterCategory', 'chatter_category_id');
    }

}
