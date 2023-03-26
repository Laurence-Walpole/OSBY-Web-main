<div>
    <div class="absolute right-0">
        <div class="flex border-gold-600 border-b-4 border-r-4 border-l-4 rounded-bl">
            @guest
                <a class="bg-gold-900 bg-opacity-50 px-6 py-2 border-gold-600 border-r-4 hover:bg-opacity-55 hover:text-gold-800 transition " href="{{route('login')}}">
                    Login
                </a>
                <a class="bg-gold-900 bg-opacity-50 px-6 py-2 hover:bg-opacity-55 hover:text-gold-800 transition " href="{{route('register')}}">
                    Register
                </a>
            @endguest
            @auth
                <a class="bg-gold-900 bg-opacity-50 px-6 py-2 border-gold-600 border-r-4 hover:bg-opacity-55 hover:text-gold-800 transition " href="{{route('dashboard')}}">
                    Dashboard
                </a>
                <form class="bg-gold-900 bg-opacity-50 py-2 " method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="px-6 py-2 hover:bg-opacity-55 hover:text-gold-800 transition"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        Logout
                    </a>
                </form>
            @endauth
        </div>
    </div>
    <div class="flex bg-gold-900 bg-opacity-50">
        <div class="mx-auto">
            <img class="h-48" src="{{asset('img/logo.png')}}" alt="OSBY"/>
        </div>
    </div>

    <nav class="flex items-center">
        <ul class="flex flex-grow">
            @foreach($navLinks as $navLink)
                <li class="text-gold-600 bg-gold-900 bg-opacity-50 border-b-4 border-t-4 border-gold-600 hover:border-gold-800 hover:bg-opacity-55 hover:text-gold-800 transition flex-grow text-center">
                    <a class="text-lg font-bold uppercase inline-block no-underline py-3 px-5" href="{{route($navLink['route'])}}">{{$navLink['tag']}}</a>
                </li>
            @endforeach
        </ul>
    </nav>
    <div class="flex items-center">
        <div class="mx-auto bg-gold-900 bg-opacity-50 px-6 py-2 border-gold-600 border-b-4 border-r-4 border-l-4 rounded-b-3xl">
            <h1>{{$playersOnline}} Players Online</h1>
        </div>
    </div>
</div>
