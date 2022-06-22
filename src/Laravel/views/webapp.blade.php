<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="https://telegram.org/js/telegram-web-app.js"></script>

        @stack('scripts')
        @stack('styles')

        <title>@yield('title', config('app.name'))</title>
    </head>
    <body>
        @yield('template')
    </body>
</html>
