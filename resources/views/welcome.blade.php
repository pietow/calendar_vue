<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="/css/app.css" rel="stylesheet">

        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased" style='background: url("images/Elefant1.jpg") no-repeat'>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 items-center sm:pt-0 "  style='background: url("images/Elefant1.jpg") no-repeat center/cover'>
            @if (Route::has('login'))
                <div class=" fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div id="app">
                <div class="md:h-32 md:w-32 p-4 border-4 rounded-lg bg-gray-200 transform md:-translate-y-12 -translate-y-20">
                    <p class="font-bold">
                        Afrikkalainen elefantti tulee Afrikasta.
                    </p>
                </div>

        
    
            </div>

        </div>
    <script src="/js/app.js"></script>
    </body>
</html>
