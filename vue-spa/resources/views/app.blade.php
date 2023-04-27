<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../public/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vue SPA</title>
{{--    <link rel="stylesheet" href="../css/app.css">--}}

</head>
    <body>
        <div id="app">Blah</div>
        @vite('resources/js/app.js')
    </body>
</html>
