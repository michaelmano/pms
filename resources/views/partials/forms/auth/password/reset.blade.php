<form method="POST" action="{{ route('auth.password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <fieldset>
        <label for="email">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
    </div>

    <fieldset>
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    </fieldset>

    <fieldset>
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="" name="password_confirmation" required>
    </fieldset>

    <fieldset>
        <button type="submit" class="btn btn-primary">
            {{ __('Reset Password') }}
        </button>
    </fieldset>
</form>
