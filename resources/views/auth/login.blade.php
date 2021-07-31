<x-guest-layout>
    <x-auth-card1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h1 class="tilte signin is-3"> Sign In</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class=" logdiv1">
                <x-label1 for="email" class="loglabel" :value="__('Email')" />

                <x-input id="email" class="block mt-1 loginput" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class=" logdiv2">
                <x-label1 for="password" class="loglabel" :value="__('Password')" />

                <x-input id="password" class="block  loginput mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block remeber mt-4">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 "
                        name="remember">
                    <span class="ml-2 ">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center forgotpassword justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline forgot " href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class=" logbutton ">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        </x-auth-card>
</x-guest-layout>
