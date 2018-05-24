<?php

namespace App\Achievements;

use Gstt\Achievements\Achievement;

class UserMadeAQuest extends Achievement
{
    /*
     * The achievement name
     */
    public $name = "First Quest";

    /*
     * A small description for the achievement
     */
    public $description = "You have made your first Quest";

    public $points = 50;

    public $icon = 'a1.jpg';
}
