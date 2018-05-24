<?php

namespace App\Http\Controllers;

use App\Achievements\UserLevelUp;
use App\Achievements\UserMadeAQuest;
use App\Quest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserQuestController extends Controller
{
    //
    // Show specific character
    public function show($id)
    {
        $quest = Quest::findOrFail($id);
        return view('quest', compact('quest'));
    }


    public function submitResult($id)
    {

        $quest = Quest::findOrFail($id);
        if ($quest) {
            $result = Input::get('result');
            preg_match($quest->solution, $result, $match);
            if ($match) {
                $questIsCompleted = Auth::user()->userquests()->get()->find($quest->id);
                if ($questIsCompleted) {
                    dd('quest already completed');
                } else {
                    Auth::user()->increment('level_id');

                    Auth::user()->userquests()->attach($quest->id);
                    $details = Auth::user()->achievementStatus(new UserMadeAQuest());
                    if ($details->unlocked_at === null) {
                        // unlocking achivement for user for creating an accont
                        Auth::user()->unlock(new UserMadeAQuest());

                        $details = Auth::user()->achievementStatus(new UserLevelUp());
                        if ($details->unlocked_at === null) {
                            Auth::user()->unlock(new UserLevelUp());
                            return redirect()->route('home', Auth::user()->name)->with('achivement', 'User got a new Achivement');
                        }

                        return redirect()->route('home', Auth::user()->name)->with('achivement', 'User got a new Achivement');
                    }
                    return redirect()->route('home', Auth::user()->name);
                }

            }
            return redirect()->back();
        }
    }
}
