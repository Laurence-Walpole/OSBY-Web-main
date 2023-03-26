@component('layouts.guest')
    <x-nav-bar/>
    <div class="container mx-auto mt-12">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <x-news />
            </div>
            <div class="col-span-1">
                <h1 class="text-4xl mb-8">Events & Statistics</h1>
                <x-events-stats/>
            </div>
        </div>
    </div>
@endcomponent
