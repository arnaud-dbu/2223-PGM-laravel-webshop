<x-authentication-layout :cart=$cart class="bg-gray-200" title="Register" description="Please fill in the information below">
    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4 mt-4 mx-7">
        @csrf
        
        <div class="text-center">
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
            <x-input-error :messages="$errors->get('lastname')" class="" />
            <x-input-error :messages="$errors->get('email')" class="" />
            <x-input-error :messages="$errors->get('password')" class="" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="" />
        </div>

        <!-- First Name -->
        <div>
            {{-- <x-input-label for="firstname" :value="__('First Name')" /> --}}

            <x-text-input id="name" class="block w-full" type="text" placeholder="Firstname" name="firstname"
                :value="old('firstname')" required autofocus />

        </div>

        <!-- Last Name -->
        <div>
            {{-- <x-input-label for="lastname" :value="__('Last Name')" /> --}}

            <x-text-input id="lastname" placeholder="Lastname" class="block w-full" type="text" name="lastname"
                :value="old('lastname')" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="">
            {{-- <x-input-label for="email" :value="__('Email')" /> --}}

            <x-text-input id="email" class="block w-full" placeholder="Email" type="email" name="email"
                :value="old('email')" required />

        </div>

        <!-- Password -->
        <div class="">
            {{-- <x-input-label for="password" :value="__('Password')" /> --}}

            <x-text-input id="password" class="block w-full" placeholder="Password" type="password" name="password"
                required autocomplete="new-password" />

        </div>

        <!-- Confirm Password -->
        <div class="">
            {{-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

            <x-text-input id="password_confirmation" class="block w-full" placeholder="Confirm password" type="password"
                name="password_confirmation" required />

        </div>

        <x-button.primary-btn class="my-0">
            {{ __('Create my account') }}
        </x-button.primary-btn>

        <p class="self-center font-secondary">Already registered? <a href="{{ route('login') }}"
                class="font-medium hover:underline">Log in</a></p>
    </form>
</x-authentication-layout>
