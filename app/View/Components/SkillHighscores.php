<?php

namespace App\View\Components;

use App\Http\Controllers\HighscoresController;
use Illuminate\View\Component;

class SkillHighscores extends Component
{
    public $skills;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->skills = collect(HighscoresController::$SKILL_DEFINITIONS)->sortBy([['id', 'asc']]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.skill-highscores');
    }
}
