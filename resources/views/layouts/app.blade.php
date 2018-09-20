<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('images/favicons/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/favicons/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/favicons/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/favicons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('images/favicons/apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('images/favicons/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('images/favicons/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('images/favicons/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicons/favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicons/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicons/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicons/favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('images/favicons/favicon-128.png') }}" sizes="128x128" />
    <meta name="theme-color" content="#fc4582">
    <meta name="application-name" content="Durian"/>
    <meta name="msapplication-TileColor" content="#fc4582" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="asset('images/favicons/mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="asset('images/favicons/mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="asset('images/favicons/mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="asset('images/favicons/mstile-310x310.png') }}" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main id="app" class="App">
        @if($errors->all())
            @foreach ($errors->all() as $error)
                <vue-flash message="{{ $error }}" type="error"></vue-flash>
            @endforeach
        @endif
        @if (Session::has('success'))
            @foreach(Session::get('success') as $message)
                <vue-flash message="{{ $message }}" type="success"></vue-flash>
            @endforeach
        @endif
        <vue-sidebar :user="{{ json_encode(Auth::user()) }}"></vue-sidebar>
        @yield('content')
    </main>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
