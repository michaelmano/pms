<form method="POST" action="{{ route('auth.password.email') }}">
    @csrf

    <fieldset>
        <label for="reset-email">{{ __('E-Mail Address') }}</label>
        <input id="reset-email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
    </fieldset>
    <fieldset>
        <button type="submit">
            {{ __('Send Password Reset Link') }}
        </button>
    </fieldset>
</form>
