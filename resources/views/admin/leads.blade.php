<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Лиды') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                                <tr>
                                    <td>
                                        {{ $lead->name }} <br>
                                        <small>{{ $lead->created_at }}</small>
                                    </td>
                                    <td>{{ $lead->email }}</td>
                                    <td>{{ $lead->contact }}</td>
                                    <td style="max-width: 400px">{{ $lead->description }}</td>
                                    <td>
                                        <form action="{{ route('deleteLead', $lead->id) }}" method="POST">
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
        </style>
    </div>
</x-app-layout>