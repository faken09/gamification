<?php

namespace App\Http\Controllers;

use App\Quest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {

        $user = User::where('name', $name)->first();
        $quests = Quest::all();
        return view('home', compact('user','quests'));
    }
}
