<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('cssFile')
        {{-- <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script> --}}
        <title>@yield('title', '作品登録')</title>
    </head>
    <body>
        <div class="section">
            @yield('content')
        </div>
        @yield('scripts')
    </body>
</html>