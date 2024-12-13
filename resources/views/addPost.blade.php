<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Добавление поста:') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <form method="POST" action="">
                        @csrf 
            
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="" required autofocus autocomplete="name" placeholder="Название поста" />
                        </div>

                        <div class="mt-4">
                            <x-label for="user_id" value="{{ __('Author') }}" />

                            <select name="user_id" id="user_id" class="block mt-1 w-full" required style="color: black; border-radius: .375rem;">
                                <option value="{{ auth()->id() }}">
                                    {{ auth()->user()->name }} (#{{ auth()->id() }})
                                </option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="category_id" value="{{ __('Category') }}" />

                            <select name="category_id" id="category_id" class="block mt-1 w-full" required style="color: black; border-radius: .375rem;">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }} #{{ $category->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="preview" value="{{ __('Preview') }}" />
                            <x-input id="preview" class="block mt-1 w-full" type="text" name="preview" placeholder="/images/ИМЯ_ФАЙЛА.РАСШИРЕНИЕ_ФАЙЛА" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="description" value="{{ __('Description') }}" />

                            <textarea name="description" id="description" class="block mt-1 w-full" placeholder="Описание поста" required></textarea>
                        </div>

                        <div class="mt-4">
                            <x-label for="createdAt" value="{{ __('Created at') }}" />
                            <x-input id="createdAt" class="block mt-1 w-full" type="text" name="created_at" value="{{ date('Y-m-d h:m:s') }}" required />
                        </div>

            
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ms-4">
                                {{ __('Add') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

