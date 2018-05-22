<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestController extends Controller
{
    //
    // Show specific character
    public function show()
    {

        return view('quest');
    }
}
