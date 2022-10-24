<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        @vite(['resources/js/app.js'])

        
    </head>
    <body class="antialiased">
        <div class="firstDiv text-red-500">
            Hello World
            <div class="firstDiv__top">
                Hello bigger
            </div>
        </div>
    </body>
</html>
