<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Добавление Слайдера') }}
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
           
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('addSlider') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        
                        <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                            <div class="grid grid-cols-6 gap-6">
                                
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="title" value="Заголовок" />
                                    <x-input name="title" id="title" type="text" placeholder="Заголовок" class="mt-1 block w-full" wire:model="state.title" required />
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="description" value="Описание" />
                                    <x-input name="description" id="description" type="text" placeholder="Описание" class="mt-1 block w-full" wire:model="state.description" required />
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="btn_name" value="Название кнопки" />
                                    <x-input name="btn_name" id="btn_name" type="text" placeholder="Название кнопки" class="mt-1 block w-full" wire:model="state.btn_name" required value="Подробнее" />
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="btn_link" value="Ссылка для кнопки" />
                                    <x-input name="btn_link" id="btn_link" type="text" placeholder="Ссылка для кнопки" class="mt-1 block w-full" wire:model="state.btn_link" required />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <input type="file" accept=".jpg,.png,.jpeg" name="image" />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">Создать</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>