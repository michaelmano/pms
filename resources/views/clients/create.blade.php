@extends('layouts.app')

@section('content')
    <h1>Create a new client</h1>
    <form method="POST" action="{{ route('clients.store') }}" aria-label="{{ __('Create Client') }}">
        @csrf
        {{ method_field('POST') }}
        <label for="name">{{ __('Client Name') }}</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <strong>{{ $errors->first('name') }}</strong>
        @endif
        <label for="acronym">{{ __('Client Acronym') }}</label>
        <input id="acronym" type="text" name="acronym" value="{{ old('acronym') }}" required autofocus>
        @if ($errors->has('acronym'))
            <strong>{{ $errors->first('acronym') }}</strong>
        @endif
        <button type="submit" aria-label="{{ __('Create') }}">{{ __('Create Client') }}</button>
    </form>
@endsection
