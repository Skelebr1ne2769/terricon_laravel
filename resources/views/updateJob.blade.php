<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Редактирование работы') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">


                    <div>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                
                            <div>
                                <x-label for="name" value="{{ __('Name') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $portfolioJob->name }}" required autofocus placeholder="Введите название работы"/>
                            </div>
                
                            <div class="mt-4">
                                <x-label for="price" value="{{ __('Price') }}" />
                                <x-input id="price" class="block mt-1 w-full" type="number" min="0" name="price" value="{{ $portfolioJob->price }}" required placeholder="Введите стоимость работы"/>
                            </div>
                
                            <div class="mt-4">
                                <x-label for="val" value="{{ __('Currency') }}" />
                                <select name="val" id="val" class="block mt-1" required style="color: black; border-radius: .375rem;">
                                    @foreach ($vals as $val)
                                        @if ($val == $portfolioJob->val)
                                        <option value="{{$val}}" selected>{{$val}}</option>
                                        @else
                                        <option value="{{$val}}">{{$val}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="mt-4">
                                <input type="file" accept=".jpg,.png,.jpeg" name="image" />
                            </div>
                
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ms-4">
                                    {{ __('Add') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <style>
                    table {
                        width: 100%;
                        text-align: left;
                        color: white;
                    }
                    table tr {
                        border-bottom: 1px solid white;
                    }
                    table td{
                        padding: 5px;
                    }
                </style>
            </div>
        </div>
    </div>
</x-app-layout>
