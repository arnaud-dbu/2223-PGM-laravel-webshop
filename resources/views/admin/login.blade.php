<x-base-layout>
    <div class="w-screen h-screen font-medium text-gray-900 bg-gray-900 font-secondary">
        <a class="absolute text-white top-4 left-4 text-md" href="{{ route('home') }}">
            <i class="pr-1 fa-solid fa-chevron-left"></i>
            Back
        </a>
        <div class="absolute w-full max-w-lg -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
            <div class="flex flex-col items-center text-gray-50">
                <x-typography.h1 class="text-gray-50">Admin</x-typography.h1>
                <p class="text-lg">Please enter your e-mail and password</p>
            </div>
            <form method="POST" action="{{ route('admin.login') }}" class="flex flex-col text-gray-50">
                @csrf

                <!-- Email Address -->
                <div class="my-5 mx-7">
                    <x-text-input id="email" class="block w-full" placeholder="Email" type="email" name="email"
                        :value="old('email')" required autofocus />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="relative mb-5 mx-7">
                    <x-text-input id="password" placeholder="Password" class="block w-full" type="password"
                        name="password" required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="" />
                </div>

                <x-button.primary-btn class="my-0 bg-gray-600 mx-7">
                    {{ __('Login') }}
                </x-button.primary-btn>
            </form>
        </div>
    </div>
</x-base-layout>
