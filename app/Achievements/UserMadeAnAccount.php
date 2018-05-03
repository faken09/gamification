<?php

namespace App\Achievements;

use Gstt\Achievements\Achievement;

class UserMadeAnAccount extends Achievement
{
    /*
     * The achievement name
     */
    public $name = "Joining the Quest";

    /*
     * A small description for the achievement
     */
    public $description = "Congratulations! You have made an account!";

    public $points = 50;

    public $icon = 'a2.jpg';
}
