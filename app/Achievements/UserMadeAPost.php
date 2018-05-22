<?php

namespace App\Achievements;

use Gstt\Achievements\Achievement;

class UserMadeAPost extends Achievement
{
    /*
     * The achievement name
     */
    public $name = "First Posts";

    /*
     * A small description for the achievement
     */
    public $description = "You have made your first post";

    public $points = 50;

    public $icon = 'a2.jpg';
}
