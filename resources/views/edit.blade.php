<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/example.css') }}">
        <title>Laravel</title>

    </head>
    <body>
        @foreach($projects as $project)
        <div>{{ $project -> product_name }}</div>
        @endforeach
    </body>
</html>
