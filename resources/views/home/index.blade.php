@extends('layouts.app')
@section('content')
    <div class="container container--flex-center">
        <vue-tabs>
            <vue-tab name="login">
                @include('partials.forms.auth.login')
            </vue-tab>
            <vue-tab name="reset-password">
                @include('partials.forms.auth.password.email')
            </vue-tab>
        </vue-tabs>
    </div>
@endsection
