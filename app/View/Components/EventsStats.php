<?php

namespace App\View\Components;

use App\Models\Player;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\Component;

class EventsStats extends Component
{
    public $most_votes;
    public $total_votes;
    public $players_today;
    public $players_total;
    public $top_player;

    private $highscores;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $allVotes = $this->getAllVotes();
        $this->highscores = HighscoresTable::getHighscores();
        $this->most_votes = $allVotes[0]['username'];
        $this->total_votes = $allVotes[1];
        $this->players_today = Redis::get('daily_player_count');
        $this->players_total = $this->getTotalPlayers();
        $this->top_player = $this->getTopPlayer()['username'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.events-stats');
    }

    function getTopPlayer(){
        return $this->highscores[0];
    }

    function getTotalPlayers(){
        return count($this->highscores);
    }

    function getAllVotes(){
        $players = Player::all()->sortBy([['times_voted', 'desc']]);
        $topPlayer = $players->first();
        $count = 0;
        foreach ($players as $player){
            $count += $player['times_voted'];
        }
        return [$topPlayer, $count];
    }
}
