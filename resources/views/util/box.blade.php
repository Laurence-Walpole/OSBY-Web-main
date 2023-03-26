<div class="block bg-gold-900 bg-opacity-50 p-6 border-gold-600 border-t-4 rounded-sm shadow mb-6">
    @isset($date)
        <div class="relative">
            <h2 class="absolute top-0 right-0">{{$date}}</h2>
        </div>
    @endisset
    <h1 class="text-2xl mb-6">{{$title}}</h1>
    {{$slot}}
{{--    <a href="{{$buttonLink}}" class="float-right bg-gold-600 hover:bg-gold-800 transition rounded px-6 py-2">{{$buttonText}}</a>--}}
</div>
