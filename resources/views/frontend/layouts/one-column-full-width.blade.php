<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/frontend.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ mix('js/alpine.js') }}" defer></script>
    </head>
    <body>
        <x-Frontend.Layouts.Components.top-bar/>
        <x-Frontend.Layouts.Components.header/>
        <x-Frontend.Layouts.Components.menu/>
        {{ $slot }}
        <x-Frontend.Layouts.Components.footer-widget/>
        <x-Frontend.Layouts.Components.footer/>
        {{$jsscript ?? ''}}
    </body>
</html>