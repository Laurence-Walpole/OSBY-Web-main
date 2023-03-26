<?php

namespace App\Http\Controllers;

use App\Models\Player;

class HomeController extends Controller
{

    public function landing(){
        return view('home.landing');
    }

    public function index(){
        return view('home.index');
    }

    public function play(){
        return redirect('http://glabaystudios.xyz/client/OSBY-launcher.jar');
    }

    public function discord(){
        return redirect('https://discord.gg/pRhc59SWrP');
    }

    public function vote(){
        return redirect('https://osby.everythingrs.com/services/vote');
    }

    public function donate(){
        return redirect('https://osby.everythingrs.com/services/store');
    }

    public function highscores(){
        return view('home.highscores');
    }

    public function individualHighscores($player_id){
        $player = Player::where(['id' => $player_id])->first();
        return view('home.individual-highscore')->with(['player' => $player]);
    }

    public function skillHighscores($skill_name){
        $skill_id = -1;
        foreach(HighscoresController::$SKILL_DEFINITIONS as $s){
            if ($s['name'] == $skill_name){
                $skill_id = $s['id'];
            }
        }
        if ($skill_id == -1) return redirect(route('highscores'));

        $skill = HighscoresController::getAllPlayersForSkill($skill_id);

        return view('home.skill-highscore')->with(['skill' => $skill, 'skill_name' => $skill_name]);
    }

}
