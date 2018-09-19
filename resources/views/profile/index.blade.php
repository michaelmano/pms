@extends('layouts.app')
@section('content')
    <h1>Profile</h1>
    <a href="{{ route('projects.index') }}" aria-label="{{ __('View Projects') }}">{{ __('Projects') }}</a>
    <a href="{{ route('clients.index') }}" aria-label="{{ __('View Clients') }}">{{ __('View Clients') }}</a>
@endsection
