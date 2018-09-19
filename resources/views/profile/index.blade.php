@extends('layouts.app')
@section('content')
    <h1>Profile</h1>
    @if (Auth::user()->away)
        <strong>Away: {{ Auth::user()->away->reason }}</strong>
        <strong>Returning: {{ Auth::user()->away->returning->diffForHumans() }}</strong>
    @endif
    <a href="{{ route('projects.index') }}" aria-label="{{ __('View Projects') }}">{{ __('Projects') }}</a>
    <a href="{{ route('clients.index') }}" aria-label="{{ __('View Clients') }}">{{ __('View Clients') }}</a>
@endsection
