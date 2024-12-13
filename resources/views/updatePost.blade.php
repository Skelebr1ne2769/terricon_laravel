<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Редактирование поста:') }}
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
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $post->name }}" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="user_id" value="{{ __('Author') }}" />

                            <select name="user_id" id="user_id" class="block mt-1 w-full" required style="color: black; border-radius: .375rem;">
                                <option value="{{ $post->user_id }}" selected>
                                    {{ $adminUsers->find($post->user_id)->name }} #{{ $post->user_id }}
                                </option>

                                @foreach ($adminUsers as $admin)
                                    @if ($admin->id != $post->user_id)
                                        <option value="{{ $admin->id }}">
                                            {{ $admin->name }} #{{ $admin->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="category_id" value="{{ __('Category') }}" />

                            <select name="category_id" id="category_id" class="block mt-1 w-full" required style="color: black; border-radius: .375rem;">
                                <option value="{{ $post->category_id }}" selected>
                                    {{ $categories->find($post->category_id)->name }} #{{ $post->category_id }}
                                </option>

                                @foreach ($categories as $category)
                                    @if ($category->id != $post->category_id)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }} #{{ $category->id }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="preview" value="{{ __('Preview') }}" />
                            <x-input id="preview" class="block mt-1 w-full" type="text" name="preview" value="{{ $post->preview }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="description" value="{{ __('Description') }}" />

                            <textarea name="description" id="description" class="block mt-1 w-full" required>{{ $post->description }}</textarea>
                        </div>

                        <div class="mt-4">
                            <x-label for="createdAt" value="{{ __('Created at') }}" />
                            <x-input id="createdAt" class="block mt-1 w-full" type="text" name="created_at" value="{{ $post->created_at }}" required />
                        </div>

            
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ms-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

