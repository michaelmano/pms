@extends('layouts.app')

@section('content')
@guest
    <a href="{{ route('login') }}">{{ __('Login') }}</a>
    <a href="{{ route('register') }}">{{ __('Register') }}</a>
@else
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endguest
<div class="container">
    <h1>Homepage</h1>
</div>
@endsection
