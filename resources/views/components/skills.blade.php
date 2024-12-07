<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
        Skills
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        Страница всех скиллов и их создания
    </p>

    <div>
        <form action="{{ route('skillCreate.post') }}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Введите название скилла" />

            <input type="number" min="0" max="100" name="lvl" />

            <input type="text" name="category" placeholder="Введите категорию" />

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">Создать скилл</button>
        </form>
    </div>

    @if($skills)
        <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
            @foreach($skills as $skill)
                {{ $skill->name }} <a href="{{ route('skillDelete', $skill->id) }}" style="color:red;">X</a><br/> 
            @endforeach
        </p>
    @endif
</div>