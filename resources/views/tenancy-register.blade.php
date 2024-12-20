<x-guest-layout>
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-center text-indigo-600 mb-4">{{ __('Register Your Account') }}</h2>

        <form method="POST" action="{{ route('tenancy.register.store') }}">
            @csrf

            <!-- Company -->
            <div>
                <x-input-label for="company" :value="__('Company')" />
                <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" required autofocus autocomplete="organization" />
                <x-input-error :messages="$errors->get('company')" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

         <!-- Domain -->
        <div class="mt-4">
            <x-input-label for="domain" :value="__('Domain')" />
            <div class="flex items-center">
                <!-- Input for Subdomain -->
                <x-text-input 
                    id="domain" 
                    class="block mt-1 w-full border-r-0 rounded-r-none" 
                    type="text" 
                    name="domain" 
                    placeholder="example" 
                    :value="old('domain')" 
                    required 
                />
                <!-- Suffix -->
                <span class="block mt-1 px-3 py-2 bg-gray-100 border border-gray-300 rounded-r-md text-gray-700">
                    {{ '.' . config('tenancy.central_domains')[1] }}
                </span>
            </div>
            <x-input-error :messages="$errors->get('domain')" class="mt-2" />
        </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Actions -->
            <div class="mt-6 flex justify-center">
                <x-primary-button>
                    {{ __('Tenancy Register') }}
                </x-primary-button>
            </div>
            </div>
        </form>
    </div>
</x-guest-layout>
