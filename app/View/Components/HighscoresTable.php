<?php

namespace App\View\Components;

use App\Models\Player;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class HighscoresTable extends Component
{
    public $highscores;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->highscores = HighscoresTable::getHighscores();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.highscores-table');
    }

    public static function getHighscores(): Collection
    {
        $players = [];
        foreach (Player::get() as $player){
            $p = [
                'id' => $player->id,
                'username' => $player->username,
                'total_level' => $player->getTotalLevel(),
                'total_xp' => $player->getTotalXP(),
            ];
            array_push($players, $p);
        }
        return collect($players)->sortBy([
            ['total_level', 'desc'],
            ['total_xp', 'desc']
        ]);
    }
}
