@extends('layouts.app')

@section('content')
    @if ($clients)
    <h1>Clients</h1>
    <ul>
        @foreach($clients as $client)
            <li><a href="{{ route('clients.show', $client) }}" title="{{ __('View') }} {{ $client->name }}">{{ $client->acronym }} - {{ $client->name }}</a></li>
        @endforeach
    </ul>
    @else
    <h1>There are currently no clients.</h1>
    @endif

    <a
        href="{{ route('clients.create') }}"
        aria-label="{{ __('Create Client') }}"
        title="{{ __('Create Client') }}"
    >
        {{ __('Create Client') }}
    </a>
@endsection
