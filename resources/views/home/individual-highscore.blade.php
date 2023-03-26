@component('layouts.highscore-layout')
    @slot('title')
        {{$player->username}} - Individual Highscores
    @endslot
    <x-individual-h-s-table :player="$player" />
@endcomponent
