@component('util.box')
    <x-slot name="title">Statistics</x-slot>
    <p>
        Most Votes: {{$most_votes}} <br/>
        Top Player: {{$top_player}} <br/>
        Total Votes: {{$total_votes}} <br/>
        Players Online Today: {{$players_today}} <br/>
        Total Players: {{$players_total}} <br/>
    </p>
@endcomponent
@component('util.box')
    <x-slot name="title">Events</x-slot>
    <p>
        None Currently
    </p>
@endcomponent

