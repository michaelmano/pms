<form method="POST" action="{{ route('auth.login') }}" aria-label="{{ __('Login') }}">
    @csrf
    <fieldset>
        <label for="login-email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        <input id="login-email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
    </fieldset>

    <fieldset>
        <label for="login-password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        <input id="login-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    </fieldset>

    <fieldset>
        <input class="form-check-input" type="checkbox" name="remember" id="login-remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="login-remember">
            {{ __('Remember Me') }}
        </label>
    </fieldset>

    <fieldset>
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>
    </fieldset>
</form>
