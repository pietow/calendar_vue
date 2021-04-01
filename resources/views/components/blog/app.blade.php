<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{ $fancybox_css ?? '' }}

        <!-- Scripts -->
        {{ $fancybox_scripts ?? '' }}
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!--custom fancybox Style-->
        {{ $fancybox_style?? '' }}

    </head>
    <body class="font-sans bg-gray-100 antialiased">
        @if (!empty($link))
        <div x-data="{ open: false }" class="h-96 bg-cover {{ $pos ?? '' }}"
            style="background-image:url({{ $link ?? '' }});">
            <x-blog.navigation />
        @else
        <div x-data="{ open: false }" class="h-20 bg-black"
            <x-blog.navigation />
        @endif

            <!-- Page Heading -->
            <header x-show="! open">
                <div class="text-center max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8">
                    {{ $header ?? '' }}
                </div>
            </header>

        </div>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <div class="bg-black sm:h-12"> 
            <div class="max-w-7xl mx-auto text-center p-6 text-xs uppercase "> 
                    <span class=" inline-block pb-1.5 sm:float-left text-gray-400 tracking-wide pr-10">© Copyright Charly J. – Theater Lifestyle</span>
                    <span class="inline-block sm:float-right text-gray-300 pr-10"><a href="{{ route('impressum') }}" class="hover:underline">Impressum</a> / Datenschutzerklärung</span>
            </div>
        </div>
    {{ $script ?? '' }}
    </body>
</html>

