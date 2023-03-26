@component('layouts.guest')
    <x-nav-bar/>
    <div class="container mx-auto mt-12">
        <div class="grid grid-cols-1 gap-4">
            <div class="text-center">
                <h1 class="text-4xl mb-8">{{$title}}</h1>
            </div>
        </div>
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-1">
                <x-skill-highscores/>
            </div>
            <div class="col-span-5">
                {{$slot}}
            </div>
        </div>
    </div>
@endcomponent
