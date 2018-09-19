<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main id="app">
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
        <vue-header :user="{{ json_encode(Auth::user()) }}"></vue-header>
        @yield('content')
    </main>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
