<?php

namespace App\Http\Controllers\Admin;

use App\Enemy;
use App\Http\Requests\QuestRequest;
use App\Level;
use App\Location;
use App\Quest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestController extends Controller
{
    public function index()
    {

        $quests = Quest::orderBy('title', 'ASC')->get();
        return view('admin.quests.index', compact('quests'));
    }

    public function create()
    {
        $locations = Location::orderBy('name', 'ASC')->get();
        $enemies = Enemy::orderBy('name', 'ASC')->get();
        $levels = Level::orderBy('id', 'ASC')->get();
        return view('admin.quests.create',compact('locations', 'enemies', 'levels'));
    }

    public function store(QuestRequest $request)
    {


        $quest = new Quest;
        $quest->title = $request->title;
        $quest->description = $request->description;
        $quest->gold_rewards = $request->gold_rewards;
        $quest->experience_gains = $request->experience_gains;



        if($request->location){
            $location = Location::findOrFail($request->location);
            if($location->id) {
                $quest->location_id = $location->id;
            }
        }
        if($request->enemy){
            $enemy = Enemy::findOrFail($request->enemy);
            if($enemy->id) {
                $quest->enemy_id = $enemy->id;
            }
        }


        if($request->required_level){
            $level = Level::findOrFail($request->required_level);
            if($level->id) {
                $quest->required_level = $level->id;
            }
        }


        if ($quest->save()) {
            return redirect()->route('admin.quests.index')->with('flash_message', $quest->id . ' er blevet oprettet!');
        }


    }

    public function edit($id)
    {
        $quest = Quest::findOrFail($id);
        if ($quest) {
            $enemies = Enemy::orderBy('name', 'ASC')->get();
            $locations = Location::orderBy('id', 'ASC')->get();
            $levels = Level::orderBy('id', 'ASC')->get();
            return view('admin.quests.edit', compact('quest', 'enemies', 'locations', 'levels'));
        }
    }

    public function update($id, EnemyRequest $request)
    {
        $enemy = Enemy::findOrFail($id);
        if ($enemy) {
            $enemy->name = $request->name;
            $enemy->description = $request->description;
            $enemy->health = $request->health;
            $enemy->attack = $request->attack;


            if ($enemy->save()) {
                return redirect()->route('admin.enemies.index')->with('flash_message', $enemy->id . ' er blevet oprettet!');
            }


        }
    }

    // delete one player
    public function destroy($id)
    {

        //find id by slug
        $quest = Quest::findOrFail($id);

        // check to see if user is owner of the post
        if ($quest->delete()) {
            return back()->with('flash_message', $quest->id . ' er blevet slettet!');
        }
        abort(404, 'page not found');
    }

}
