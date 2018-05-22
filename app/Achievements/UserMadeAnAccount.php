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
    public $description = "Making your account!";

    public $points = 50;

    public $icon = 'a1.jpg';
}
