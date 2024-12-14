<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Слайды') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <a href="/admin/add-slider">
                        <x-button>Создать слайд</x-button>
                    </a>

                    <br>
                    <br>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>btn_name</th>
                                <th>btn_link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td><img src="/storage/{{ $slider->image }}" alt="" width="150"></td>
                                    <td>{{ $slider->description }}</td>
                                    <td>{{ $slider->btn_name }}</td>
                                    <td>{{ $slider->btn_link }}</td>

                                    <td>
                                        <form action="{{ route('deleteSlider', $slider->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500"  type="submit">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                border-right: 1px solid white;
                border-left: 1px solid white;
            }
        </style>
    </div>
</x-app-layout>