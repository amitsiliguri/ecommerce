<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/frontend.css') }}">
        <!-- Scripts -->
        <script src="{{ mix('js/alpine.js') }}" defer></script>
    </head>
    <body>
        <x-Frontend.Layouts.Components.top-bar/>
        <x-Frontend.Layouts.Components.header/>
        <x-Frontend.Layouts.Components.menu/>
        <div class="flex flex-col md:flex-row max-w-screen-xl xl:mx-auto md:mx-2">
            <div class="w-full md:w-9/12 py-2 px-2 xl:px-0">{{ $slot }}</div>
            <div class="w-full md:w-3/12 py-2 px-2 xl:px-0">
                {{ $sidebarMain ?? '' }}
                <hr>
                {{ $sidebarAdditional ?? '' }}
            </div>
        </div>
        <x-Frontend.Layouts.Components.footer-widget/>
        <x-Frontend.Layouts.Components.footer/>
        {{$jsscript}}
    </body>
</html>