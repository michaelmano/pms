<form method="POST" class="Form util-text-center" action="{{ route('auth.login') }}" aria-label="{{ __('Login') }}">
    @csrf
    <fieldset class="Form__fieldset">
        <input
            id="email"
            type="email"
            name="email"
            class="Form__input {{ $errors->has('email') ? ' is-invalid' : '' }}"
            value="{{ old('email') }}"
            required
            autofocus
        >
        <label for="email" class="Form__label">{{ __('E-Mail Address') }}</label>
    </fieldset>

    <fieldset class="Form__fieldset">
        <input
            id="password"
            type="password"
            name="password"
            class="Form__input {{ $errors->has('password') ? ' is-invalid' : '' }}"
            required
        >
        <label for="password" class="Form__label">{{ __('Password') }}</label>
    </fieldset>
    <fieldset class="Form__fieldset">
        <button type="submit" class="Button">
            {{ __('Login') }}
        </button>
    </fieldset>
</form>
