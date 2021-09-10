<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        [x-cloak] {
            display: none
        }

    </style>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    @livewireStyles
</head>

<body>
    <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">

        <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto">

        </nav>
        <!-- <button class="inline-flex items-center px-3 py-1 mt-4 text-base text-white bg-gray-700 border-0 rounded focus:outline-none hover:bg-gray-500 md:mt-0">Log In
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </button> -->
        <a href="{{ route('login') }}"
            class="inline-block px-6 py-2 text-lg font-medium leading-6 text-center text-gray-700 transition bg-transparent border-2 border-gray-500 rounded ripple hover:bg-gray-200 focus:outline-none">
            @guest
                Log In
            @endguest
            @auth
                View Messages
            @endauth
        </a>
        @guest
        <div class="mx-4 my-3">
            <a href="#signgUp"
                class="inline-block px-6 py-2 text-lg font-medium leading-6 text-center text-gray-700 transition bg-transparent border-2 border-gray-500 rounded ripple hover:bg-gray-200 focus:outline-none">
                Sign Up
            </a>
        </div>
        @endguest


        @auth
            <form class="mx-4 my-3" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault();
                         this.closest('form').submit();"
                    class="inline-block px-6 py-2 text-lg font-medium leading-6 text-center text-gray-700 transition bg-transparent border-2 border-gray-500 rounded ripple hover:bg-gray-200 focus:outline-none">
                    Logout {{ auth()->user()->name }}
                </a>
            </form>
        @endauth

    </div>
    <section class="px-4 py-20 mx-auto max-w-7xl">
        <div class="grid items-center w-full grid-cols-1 gap-0 mx-auto lg:grid-cols-12 lg:gap-24 xl:w-11/12">
            <div class="col-auto text-center md:col-span-7 lg:text-left">
                <div class="mb-8">
                    <img class="h-20 mx-auto " src="{{ asset('oaustech.jpg') }}" alt="">
                </div>
                <h1
                    class="mb-4 text-3xl font-bold leading-tight text-gray-900 md:text-4xl md:leading-none tracking-none md:tracking-tight">
                    Welcome to OAUSTECH Advisory Board</h1>
                <p class="mb-10 text-lg font-light text-gray-500 md:text-xl md:tracking-relaxed md:mb-4">where you can
                    interact with your advisers.</p>
            </div>
            <div id="signgUp" class="col-auto md:col-span-5">
                @livewire('home')
                @guest
                    <p class="text-xs text-center text-gray-600">By signing up you agree to our <a href="#"
                            class="text-primary">Terms of Service</a></p>
                @endguest
            </div>
        </div>
    </section>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>

</html>
