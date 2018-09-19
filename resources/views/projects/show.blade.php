@extends('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>
    @foreach($project->users as $user)
        {{ $user->name }}
    @endforeach
@endsection
