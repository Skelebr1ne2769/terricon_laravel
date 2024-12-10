

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('addUserPost') }}">
            @csrf 

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="" required />
            </div>

            <div class="mt-4">
                <x-label for="role" value="{{ __('Role') }}" />
                <select name="role" id="role" class="block mt-1 w-full" required style="color: black; border-radius: .375rem;">
                    <option value="user" selected>user</option>
                    <option value="admin">admin</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Add') }}
                </x-button>
                <a href="/dashboard">
                    <x-button class="ms-4" type="button" >
                        {{ __('Back') }}
                    </x-button>
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
