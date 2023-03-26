<?php

namespace App\View\Components;

use App\Http\Controllers\HighscoresController;
use App\Models\Player;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class IndividualHSTable extends Component
{
    public Collection $skills;
    public Player $player;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($player)
    {
        $this->player = $player;
        $this->skills = $this->getPlayerSkills();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.individual-h-s-table');
    }

    public function getPlayerSkills(): Collection{
        $skills = [];
        foreach($this->player->getSkills() as $skill){
            $s = [
                'id' => $skill->skill_id,
                'level' => $skill->skill_level,
                'xp' => $skill->player_exp,
                'rank' => $this->player->calculateRankInSkill($skill->skill_id),
                'name' => HighscoresController::$SKILL_DEFINITIONS[$skill->skill_id]['name'],
                'icon' => HighscoresController::$SKILL_DEFINITIONS[$skill->skill_id]['icon'],
            ];
            array_push($skills, $s);
        }
        $total = [
            'id' => -1,
            'level' => $this->player->getTotalLevel(),
            'xp' => $this->player->getTotalXP(),
            'rank' => $this->player->calculateTotalRank(),
            'name' => HighscoresController::$SKILL_DEFINITIONS[sizeof($skills)]['name'],
            'icon' => HighscoresController::$SKILL_DEFINITIONS[sizeof($skills)]['icon'],
        ];
        array_push($skills, $total);
        return collect($skills)->sortBy([
            ['id', 'asc']
        ]);
    }
}
