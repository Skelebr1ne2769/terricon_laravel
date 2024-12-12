<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Категории постов') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <a href="{{ route('addCategory') }}">
                        <x-button>Добавить новую категорию</x-button>
                    </a>

                    <br>
                    <br>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td style="padding: 5px">{{ $category->id }}</td>
                                    <td style="padding: 5px">
                                        <a href="{{ 
                                            route('pages', [
                                                'name' => 'blog',
                                                'category_id' => $category->id
                                            ]) }}" 
                                            style="text-decoration: underline;">{{ $category->name }}</a>
                                    </td>
                                    <td style="padding: 5px">
                                        <a href="{{ route('deleteCategory', $category->id) }}" 
                                            style="color: red;" 
                                            onclick="if(!confirm('Точно удалить?')) return false;">Удалить</a>
                                    </td>
                                    <td style="padding: 5px"><a href="/admin/updateCategory/{{ $category->id }}">Редактировать</a></td>
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
        </style>
    </div>
</x-app-layout>