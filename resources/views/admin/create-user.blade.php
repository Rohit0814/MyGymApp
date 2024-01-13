<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 max-w-full divide-y">
        
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
        
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <!-- Email Address -->
                <div class="flex gap-6">
                    <div class="flex-1">
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                    </div>

                    <div class="flex-1">
                        <label class="text-sm">Role</label>
                        <select name="userType" class="block mt-2 w-full border-gray-300 focus:ring-0 focus:border-gray-500">
                            <option value="Member" class="p-5">member</option>
                            <option value="Instructor">Instructor</option>
                        </select>
                    </div>

                    </div>
        
                <!-- Password -->
                <div class="flex gap-6">
                    <div class="flex-1">
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                    </div>
        
                <!-- Confirm Password -->
                <div class="flex-1">
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                </div>
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
        
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
                </div>
            </div>
        </div>
       
    </div>

</x-app-layout>