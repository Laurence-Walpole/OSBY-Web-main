<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\PlayerSkill;
use Illuminate\Http\Request;

class HighscoresController extends Controller
{
    public $API_KEY = '05Tfn7uUnHCnMCKh5nBg';

    public static array $SKILL_DEFINITIONS = [
        [
            'id' => 0,
            'name' => 'Attack',
            'icon' => 'attack.png'
        ],
        [
            'id' => 1,
            'name' => 'Defence',
            'icon' => 'defence.png'
        ],
        [
            'id' => 2,
            'name' => 'Strength',
            'icon' => 'strength.png'
        ],
        [
            'id' => 3,
            'name' => 'Hitpoints',
            'icon' => 'hitpoints.png'
        ],
        [
            'id' => 4,
            'name' => 'Range',
            'icon' => 'range.png'
        ],
        [
            'id' => 5,
            'name' => 'Prayer',
            'icon' => 'prayer.png'
        ],
        [
            'id' => 6,
            'name' => 'Magic',
            'icon' => 'magic.png'
        ],
        [
            'id' => 7,
            'name' => 'Cooking',
            'icon' => 'cooking.png'
        ],
        [
            'id' => 8,
            'name' => 'Woodcutting',
            'icon' => 'woodcutting.png'
        ],
        [
            'id' => 9,
            'name' => 'Fletching',
            'icon' => 'fletching.png'
        ],
        [
            'id' => 10,
            'name' => 'Fishing',
            'icon' => 'fishing.png'
        ],
        [
            'id' => 11,
            'name' => 'Firemaking',
            'icon' => 'firemaking.png'
        ],
        [
            'id' => 12,
            'name' => 'Crafting',
            'icon' => 'crafting.png'
        ],
        [
            'id' => 13,
            'name' => 'Smithing',
            'icon' => 'smithing.png'
        ],
        [
            'id' => 14,
            'name' => 'Mining',
            'icon' => 'mining.png'
        ],
        [
            'id' => 15,
            'name' => 'Herblore',
            'icon' => 'herblore.png'
        ],
        [
            'id' => 16,
            'name' => 'Agility',
            'icon' => 'agility.png'
        ],
        [
            'id' => 17,
            'name' => 'Thieving',
            'icon' => 'thieving.png'
        ],
        [
            'id' => 18,
            'name' => 'Slayer',
            'icon' => 'slayer.png'
        ],
        [
            'id' => 19,
            'name' => 'Farming',
            'icon' => 'farming.png'
        ],
        [
            'id' => 20,
            'name' => 'Runecrafting',
            'icon' => 'runecrafting.png'
        ],
        [
            'id' => 21,
            'name' => 'Hunter',
            'icon' => 'hunter.png'
        ],
        [
            'id' => 22,
            'name' => 'Construction',
            'icon' => 'construction.png'
        ],
        [
            'id' => -1,
            'name' => 'Total',
            'icon' => 'total.png'
        ],
    ];

    public static function getAllPlayersForSkill($skill_id){
        $skills_raw = PlayerSkill::where(['skill_id' => $skill_id])->get();
        $skills = [];

        foreach($skills_raw as $skill){
            $player = Player::where(['id' => $skill->player_id])->first();
            $s = [
                'player_id' => $player->id,
                'player_name' => $player->username,
                'player_level' => $skill->skill_level,
                'player_exp' => $skill->player_exp
            ];
            array_push($skills, $s);
        }

        $skills = collect($skills)->sortBy([
            ['player_level', 'desc'],
            ['player_exp', 'desc']
        ]);

        return $skills;
    }

    public function addOrUpdatePlayer(){
        $key = \request('api_key');

        if ($key == $this->API_KEY) {
            $player_name = \request('player_name');
            $skills = json_decode(\request('player_skills'));
            if ($player_name != null) {
                $player = Player::firstOrCreate([
                    'user_id' => 1,
                    'username' => $player_name
                ]);

                $player->save();
                foreach ($skills as $skillRaw) {
                    $skill_exists = PlayerSkill::where(['player_id' => $player->id, 'skill_id' => $skillRaw->skill_id])->first();
                    if ($skill_exists === null) {
                        $skill = PlayerSkill::firstOrCreate([
                            'player_id' => $player->id,
                            'skill_id' => $skillRaw->skill_id,
                            'skill_level' => $skillRaw->skill_level,
                            'player_exp' => $skillRaw->player_exp,
                        ]);
                        $skill->save();
                    } else {
                        $skill_exists->update([
                            'skill_level' => $skillRaw->skill_level,
                            'player_exp' => $skillRaw->player_exp
                        ]);
                        $skill_exists->save();
                    }

                }
                return response(json_encode(['result' => true, 'message' => $player->username]), 200);
            }
            return response(json_encode(['result' => false, 'message' => 'Player name NULL']), 400);
        }
        return response(json_encode(['result' => false, 'message' => 'Auth key incorrect']), 400);
    }
}
