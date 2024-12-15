<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">


    <div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="" required autofocus placeholder="Введите название работы"/>
            </div>

            <div class="mt-4">
                <x-label for="price" value="{{ __('Price') }}" />
                <x-input id="price" class="block mt-1 w-full" type="number" min="0" max="1000000" name="price" value="" required placeholder="Введите стоимость работы"/>
            </div>

            <div class="mt-4">
                <x-label for="val" value="{{ __('Currency') }}" />
                <select name="val" id="val" class="block mt-1" required style="color: black; border-radius: .375rem;">
                    <option value="$" selected>$</option>
                    <option value="€">€</option>
                    <option value="₸">₸</option>
                    <option value="₽">₽</option>
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
    <br>
    <hr>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Currency</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolioJobs as $portfolioJob)
                <tr>
                    <td>{{ $portfolioJob->id }}</td>
                    <td>{{ $portfolioJob->name }}</td>
                    <td><img src="/storage/{{ $portfolioJob->image }}" alt="" width="150"></td>
                    <td>{{ $portfolioJob->price }}</td>
                    <td>{{ $portfolioJob->val }}</td>

                    <td>
                        <a href="{{ route('deleteJob', $portfolioJob->id) }}" style="color:red;">Удалить</a>
                    </td>
                    <td>
                        <a href="{{ route('renderUpdateJob', $portfolioJob->id) }}">Редактировать</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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