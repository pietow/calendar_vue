<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
        rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body class="h-screen antialiased flex items-center justify-center">
    <div id='app' class="calendar m-auto w-1/2">
        <month-container></month-container>
        {{-- <calendar-component ref="calendar"> --}}
        {{-- </calendar-component> --}}
      {{-- <month-component :month="'02'"> </month-component> --}}
    <!--
        <button id="external-button" @click="$refs.calendar.test()">External Button</button>
    --!>
    </div>
    <script src="https://kit.fontawesome.com/a4b21b2923.js" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
</body>

</html>
