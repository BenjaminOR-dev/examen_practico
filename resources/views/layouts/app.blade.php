<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('app.inicio') }}">{{ config('app.name') }}</a>
        </div>
    </nav>

    <div id="content" class="m-4">
        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>
