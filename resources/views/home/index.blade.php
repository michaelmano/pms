@extends('layouts.app')
@section('content')
    <div class="container container--flex-center">
        <vue-tabs>
            <vue-tab name="login">
                @include('partials.forms.login')
            </vue-tab>
            <vue-tab name="register">
                @include('partials.forms.register')
            </vue-tab>
        </vue-tabs>
    </div>
@endsection
