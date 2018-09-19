@extends('layouts.app')

@section('content')
    @if (isset($clients) && $clients->isNotEmpty())
        <h1>Create a new Project</h1>
        <form method="POST" action="{{ route('projects.store') }}" aria-label="{{ __('Create Project') }}">
            @csrf
            {{ method_field('POST') }}
            <label for="title">{{ __('Project Title') }}</label>
            <input id="title" type="text" name="title" value="{{ old('title') }}" required autofocus>
            @if ($errors->has('title'))
                <strong>{{ $errors->first('title') }}</strong>
            @endif

            <label for="client_id">{{ __('Client') }}</label>
            <select id="client_id" name="client_id">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
            <strong>or <a href="{{ route('clients.create') }}">create a new client</a></strong>
            @if ($errors->has('client_id'))
                <strong>{{ $errors->first('client_id') }}</strong>
            @endif

            <label for="job_code">{{ __('Job Code') }}</label>
            <input id="job_code" type="text" name="job_code" value="{{ old('job_code') }}" required autofocus>
            @if ($errors->has('job_code'))
                <strong>{{ $errors->first('job_code') }}</strong>
            @endif

            <label for="description">{{ __('Description') }}</label>
            <textarea id="description" name="description">
                {{ old('description') }}
            </textarea>
            @if ($errors->has('description'))
                <strong>{{ $errors->first('description') }}</strong>
            @endif

            <button type="submit" aria-label="{{ __('Create') }}">{{ __('Create Project') }}</button>
        </form>
    @else
        <h1>There are currently no clients, You must <a href="{{ route('clients.create') }}">create a client</a> before creating a project</h1>
    @endif
@endsection
