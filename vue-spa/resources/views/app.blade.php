<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../public/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
{{--    <script>--}}
{{--        tailwind.config = {--}}
{{--            theme: {--}}
{{--                extend: {--}}
{{--                    colors: {--}}
{{--                        laravel: "#ef3b2d",--}}
{{--                    },--}}
{{--                },--}}
{{--            },--}}
{{--        };--}}
{{--    </script>--}}

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <title>Vue SPA</title>
{{--    <link rel="stylesheet" href="../css/app.css">--}}

</head>
    <body>
        <div id="app">Blah</div>
        @vite('resources/js/app.js')
    </body>
</html>
