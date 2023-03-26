<div>
    <h1 class="text-4xl mb-8">News Posts</h1>
    @foreach($posts as $post)
        @component('util.box')
            <x-slot name="date">{{(new Carbon\Carbon($post->created_at))->toFormattedDateString()}}</x-slot>
            <x-slot name="title">{{$post->title}}</x-slot>
            <p>{{$post->body}}</p>
        @endcomponent
    @endforeach
</div>
