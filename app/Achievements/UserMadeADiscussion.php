<?php

namespace App\Achievements;

use Gstt\Achievements\Achievement;

class UserMadeADiscussion extends Achievement
{
    /*
     * The achievement name
     */
    public $name = "User made an Discussion";

    /*
     * A small description for the achievement
     */
    public $description = "You have made your first reply to a post";

    public $points = 50;

    public $icon = 'a3.jpg';
}
