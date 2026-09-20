<x-guest-layout>
    <section class="login">
        <div class="login__card">

            <div class="login__header">
                <h1>Welcome back</h1>
                <p>Log in to your Freelance Hub.</p>
            </div>

            <x-auth-session-status class="login__status" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="login__form">
                @csrf

                <div class="login__field">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="login__field">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />

                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div class="login__options">
                    <label for="remember_me" class="login__remember">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span>{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="login__button">
                    {{ __('Login') }}
                </button>

                <p>
                    Don´t have an account? <a href="{{ route('register') }}">Register</a>
                </p>
            </form>

        </div>
    </section>
</x-guest-layout>
