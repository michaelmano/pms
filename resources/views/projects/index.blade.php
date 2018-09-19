@extends('layouts.app')

@section('content')
    @if (isset($projects))
        <h1>Projects</h1>
        <ul>
            @foreach($projects as $project)
                <li><a href="{{ route('projects.show', $project) }}" title="{{ __('View') }} {{ $project->title }}">{{$project->job_code }} - {{ $project->title }}</a></li>
            @endforeach
        </ul>
    @else
        <h1>There are currently no projects.</h1>
    @endif
    <a
        href="{{ route('projects.create') }}"
        aria-label="{{ __('Create Project') }}"
        title="{{ __('Create Project') }}"
    >
        {{ __('Create Project') }}
    </a>
@endsection
