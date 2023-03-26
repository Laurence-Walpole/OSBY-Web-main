@component('layouts.highscore-layout')
    @slot('title')
        {{$skill_name}} - Highscores
    @endslot
    <x-skill-h-s-table :skill="$skill"/>
@endcomponent
