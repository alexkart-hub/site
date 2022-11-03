<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Post;
use App\Models\Theme;
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
         Theme::factory(1)->create([
             'title' => 'test',
             'code' => 'test',
             'level' => 1,
             'margin_left' => 1,
             'margin_right' => 2,
             'parent_id' => null
         ]);
         Post::factory(20)->create([
             'theme_id' => 1
         ]);
         AdminUser::factory(1)->create([
             'name' => 'admin',
             'email' => 'admin@maxis-life.ru',
             'password' => bcrypt('12345'),
         ]);
    }
}
