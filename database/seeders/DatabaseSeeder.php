<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         Category::factory(1)->create([
             'name' => 'Php',
             'code' => 'php',
             'title' => 'Язык программирования php',
             'description' => 'Все о php',
             'level' => 1,
             'margin_left' => 1,
             'margin_right' => 4,
             'parent_id' => null
         ]);
         Category::factory(1)->create([
             'name' => 'Laravel',
             'code' => 'laravel',
             'title' => 'Laravel',
             'description' => 'Все о laravel',
             'level' => 2,
             'margin_left' => 2,
             'margin_right' => 3,
             'parent_id' => 1
         ]);
         Category::factory(1)->create([
             'name' => 'Эластик',
             'code' => 'elastic',
             'title' => 'Поиск с эластиком',
             'description' => 'Все об elasticsearch',
             'level' => 1,
             'margin_left' => 5,
             'margin_right' => 6,
             'parent_id' => null
         ]);
         Category::factory(1)->create([
             'name' => 'Битрикс',
             'code' => 'bitrix',
             'title' => 'Сайты битрикс',
             'description' => 'Все о битриксе',
             'level' => 1,
             'margin_left' => 7,
             'margin_right' => 8,
             'parent_id' => null
         ]);
         Post::factory(5)->create([
             'category_id' => 1
         ]);
         Post::factory(5)->create([
             'category_id' => 2
         ]);
         Post::factory(5)->create([
             'category_id' => 3
         ]);
         Post::factory(5)->create([
             'category_id' => 4
         ]);
         AdminUser::factory(1)->create([
             'name' => 'admin',
             'email' => 'admin@maxis-life.ru',
             'password' => bcrypt('12345'),
         ]);
    }
}
