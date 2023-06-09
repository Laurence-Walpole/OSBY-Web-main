<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SkillHSTable extends Component
{
    public $skill;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($skill)
    {
        $this->skill = $skill;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.skill-h-s-table');
    }
}
