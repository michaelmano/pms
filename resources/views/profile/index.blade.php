@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (!Auth::user()->profile->slack_token)
                        <p>Intergrate your slack account now</p>
                        <a class="btn btn-primary" href="{{ route('slack.auth') }}">Add Slack</a>
                    @else
                        <h3>Change your status</h3>
                        <form method="POST" action="{{ route('profile.status', Auth::user()->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="emoji">Emoji</label>
                                <select class="form-control" name="emoji" id="emoji">
                                    <option value="">None</option>
                                    @foreach(Slack::getEmojis() as $name => $url)
                                        <option value=":{{ $name }}:" data-image="{{ $url }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="text">Text</label>
                                <input type="text" class="form-control" name="text" id="text">
                            </div>
                            <div class="form-group">
                                <label for="expiration">Expiration</label>
                                <input type="number" class="form-control" name="expiration" id="expiration" value="0">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
