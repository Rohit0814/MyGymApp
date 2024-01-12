<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased" style="background: url('https://i.pinimg.com/564x/1f/d4/39/1fd4398cb4eb02502234efa6667c28cf.jpg');background-repeat:no-repeat;background-size:cover; background-position:center center">
    <div class=" max-w-7xl h-screen mx-auto p-6 lg:p-8">
        <div class="flex flex-col h-full justify-center items-center">
            <h1 class=" font-medium text-8xl font-serif">MyGym</h1>
            {{-- <x-application-logo class="w-28 h-28 fill-current text-gray-500" /> --}}
            <div class="mt-8">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 bg-purple-600 border border-transparent rounded-md font-bold text-xl text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</body>

</html>
