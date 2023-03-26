<div class="block bg-gold-900 bg-opacity-50 border-gold-600 border-t-4 rounded-sm shadow mb-6">
    <h1 class="text-2xl py-4 text-center border-b-2 border-gold-800">Skills</h1>
    @foreach($skills as $skill)
        <a href="{{route('highscores-skills', ['skill_name' => $skill['name']])}}"
           class="text-md font-medium text-white p-2 pl-6 block border-b-2 border-gold-800 hover:bg-gold-600 transition"
        >
            <img class="inline-block" src="{{asset('img/skills/'.$skill['icon'])}}" alt="{{$skill['name']}}" />
            <h1 class="inline-block">{{$skill['name']}}</h1>
        </a>
    @endforeach
</div>
