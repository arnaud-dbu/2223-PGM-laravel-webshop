<x-authentication-layout :cart=$cart class="bg-gray-200" title="Login" description="Please enter your e-mail and password">
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <form method="POST" action="{{ route('login') }}" class="flex flex-col">
        @csrf

        <!-- Email Address -->
        <div class="my-5 mx-7">
            {{-- <x-input-label for="email" :value="__('Email')" /> --}}

            <x-text-input id="email" class="block w-full" placeholder="Email" type="email" name="email"
                :value="old('email')" required autofocus  />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="relative mb-5 mx-7">
            {{-- <x-input-label for="password" :value="__('Password')" /> --}}

            <x-text-input id="password" placeholder="Password" class="block w-full" type="password"
                name="password" required autocomplete="current-password" />

            @if (Route::has('password.request'))
                <a class="absolute text-sm text-gray-900 normal-case translate-y-1/2 right-3 bottom-1/2 opacity-70 font-secondary hover:opacity-50 hover:underline"
                    href="#">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-input-error :messages="$errors->get('password')" class="" />
        </div>

        <x-button.primary-btn class="my-0 mx-7">
            {{ __('Login') }}
        </x-button.primary-btn>

        <p class="self-center my-3 font-secondary">Don't have an account? <a href="{{route('register')}}" class="font-medium hover:underline">Create one</a></p>

    </form>
</x-authentication-layout>
