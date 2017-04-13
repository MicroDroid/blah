<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @if (session('jwt'))
            <meta name="jwt" content="{{ session('jwt') }}">
        @endif

        <title>{{config('app.name', 'blah')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
        </div>

        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
