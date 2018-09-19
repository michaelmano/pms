<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
    @csrf
    <fieldset>
        <label for="register-first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
        <input id="register-first_name" type="text" class="{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
    </fieldset>

    <fieldset>
        <label for="register-last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
        <input id="register-last_name" type="text" class="{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
    </fieldset>

    <fieldset>
        <label for="register-email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        <input id="register-email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
    </fieldset>

    <fieldset>
        <label for="register-password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        <input id="register-password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    </fieldset>

    <fieldset>
        <label for="register-password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        <input id="register-password-confirm" type="password" class="" name="password_confirmation" required>
    </fieldset>

    <fieldset>
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
    </fieldset>
</form>
