<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar/>

        <div class="m-custom content">
            {{$slot}}
        </div>

    {{-- @if(!App::currentRouteName()=="login"||!App::currentRouteName()=="forgot-password"||!App::currentRouteName()=="reset-password") --}}
    <x-footer/>
    {{-- @endif --}}
</body>
</html>