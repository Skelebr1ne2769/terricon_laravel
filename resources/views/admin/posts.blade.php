<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Посты') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <a href="/admin/addPost">
                        <x-button>Создать новый пост</x-button>
                    </a>

                    <br>
                    <br>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Preview</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                        <a href="{{ 
                                            route('pages', [
                                                'name' => 'post',
                                                'post_id' => $post->id
                                            ]) }}" 
                                            style="text-decoration: underline;">{{ $post->name }}</a>
                                    </td>
                                    <td>{{ $post->preview }}</td>
                                    <td>{{ $users->find($post->user_id)->name }} #{{$post->user_id}}</td>
                                    <td>
                                        <a href="{{ 
                                            route('pages', [
                                                'name' => 'blog',
                                                'category_id' => $post->category_id
                                            ]) }}" 
                                            style="text-decoration: underline;">#{{ $post->category_id }}
                                        </a>
                                    </td>
                                    <td>{{ $post->created_at }}</td>



                                    <td>
                                        <a href="{{ route('deletePost', $post->id) }}" 
                                            style="color: red;" 
                                            onclick="if(!confirm('Точно удалить?')) return false;">Удалить</a>
                                    </td>
                                    <td><a href="/admin/updatePost/{{ $post->id }}">Редактировать</a></td>
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
            }
        </style>
    </div>
</x-app-layout>