<x-guest-layout>
    <section class="verify-email">
        <div class="verify-email__card">

            <div class="verify-email__header">
                <h1>Verify your email</h1>

                <p>
                    Thanks for signing up!
                    Before getting started, please verify your email address
                    by clicking the link we sent you.
                </p>

                <p>
                    If you didn't receive the email, you can request a new one below.
                </p>
            </div>

            @if (session('status') === 'verification-link-sent')
                <div class="verify-email__success" role="status">
                    A new verification link has been sent to the email address
                    you provided during registration.
                </div>
            @endif

            <div class="verify-email__actions">

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit" class="verify-email__button">
                        Resend Verification Email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="verify-email__logout">
                        Log Out
                    </button>
                </form>

            </div>

        </div>
    </section>
</x-guest-layout>
