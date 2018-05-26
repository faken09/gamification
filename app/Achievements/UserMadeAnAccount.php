<?php

namespace App\Achievements;

use Gstt\Achievements\Achievement;

class UserMadeAnAccount extends Achievement
{
    /*
     * The achievement name
     */
    public $name = "velkommen til CodeQuest";

    /*
     * A small description for the achievement
     */
    public $description = "Oprette en konto!";

    public $points = 50;

    public $icon = 'a1.jpg';
}
