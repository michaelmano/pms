<form method="POST" class="Form util-text-center" action="{{ route('auth.login') }}" aria-label="{{ __('Login') }}">
    @csrf
    <fieldset>
        <label for="email" class="util-sr-only">{{ __('E-Mail Address') }}</label>
        <input
            id="email"
            type="email"
            name="email"
            placeholder="Email Address"
            class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
            value="{{ old('email') }}"
            required
            autofocus>
    </fieldset>

    <fieldset>
        <label for="password" class="util-sr-only">{{ __('Password') }}</label>
        <input
            id="password"
            type="password"
            name="password"
            placeholder="Password"
            class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
            required>
    </fieldset>
    <fieldset>
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>
    </fieldset>
</form>
