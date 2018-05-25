<?php

namespace App\Achievements;

use Gstt\Achievements\Achievement;

class UserLevelUp extends Achievement
{
    /*
     * The achievement name
     */
    public $name = "Level Up";

    /*
     * A small description for the achievement
     */
    public $description = "Tillykke du har stiget et level!";

    public $points = 50;

    public $icon = 'a3.jpg';
}
