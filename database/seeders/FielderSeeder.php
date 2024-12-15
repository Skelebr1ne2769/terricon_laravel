<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class FielderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fielders')->insert([
            ['field_name' => 'phone', 'field_value' => '+7 999 999 99 99'],
            ['field_name' => 'email', 'field_value' => '0@mail.ru'],
            ['field_name' => 'slogan', 'field_value' => 'Закажите разработку у меня до нового года и получите скидку 15%'],
            ['field_name' => 'about_me', 'field_value' => 'Меня зовут Степан, я начинающий веб-разработчик, знаю следующие языки программирования: PHP, JavaScript, C#'],
            ['field_name' => 'deviz', 'field_value' => 'Чем выше шкаф, тем больше дров.']
        ]);

        DB::table('categories')->insert([
            ['name' => 'IT-технологии'],
            ['name' => 'Laravel'],
            ['name' => 'Жизнь'],
            ['name' => 'Спорт'],
        ]);

        DB::table('skills')->insert([
            ['name' => 'PHP', 'lvl' => 90, 'category' => 'Backend'],
            ['name' => 'JavaScript', 'lvl' => 80, 'category' => 'Frontend'],
            ['name' => 'NodeJS', 'lvl' => 75, 'category' => 'Backend'],
        ]);

        DB::table('posts')->insert([
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 2],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 2],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 2],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 3],
            ['name' => 'Это мой первый пост', 'description' => 'Тестовое описание', 'preview' => '/images/blog-img1.jpg', 'user_id' => 1, 'category_id' => 1]
        ]);
    }
}
