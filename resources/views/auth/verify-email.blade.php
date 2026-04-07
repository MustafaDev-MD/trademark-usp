<x-guest-layout>

    <div class="login-userheading">
        <h3>Verify Your Email</h3>
        <h4>
            Thanks for signing up! Before getting started, please verify your
            email address by clicking the link we just emailed to you.
        </h4>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mt-3">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <!-- Resend Verification Email -->
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div class="form-login mt-4">
            <button type="submit" id="submitBtn" class="btn btn-login w-100">
                Resend Verification Email
            </button>
        </div>
    </form>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}" class="mt-3 text-center">
        @csrf

        <button type="submit" id="submitBtn" class="btn btn-link text-danger">
            Log Out
        </button>
    </form>



</x-guest-layout>
