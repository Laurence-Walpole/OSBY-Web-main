<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Redis;
use Illuminate\View\Component;

class NavBar extends Component
{
    public $navLinks;
    public $playersOnline;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->navLinks =         [
            ['tag' => 'Home', 'route' => 'home'],
            ['tag' => 'Play Now', 'route' => 'play'],
            ['tag' => 'Vote', 'route' => 'vote'],
            ['tag' => 'Donate', 'route' => 'donate'],
            ['tag' => 'Highscores', 'route' => 'highscores'],
            ['tag' => 'Discord', 'route' => 'discord']
        ];
        $this->playersOnline = $this->getPlayersOnline();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-bar');
    }

    function getPlayersOnline(): int {
        return Redis::get('player_count');
    }
}
