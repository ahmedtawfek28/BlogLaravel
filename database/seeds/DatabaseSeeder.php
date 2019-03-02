<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
       factory(App\Tag::class, 30)->create();
        factory(App\Category::class, 10)->create();
       factory(App\Post::class, 50)->create();
       factory(App\subscriber::class, 50)->create();
        factory(App\PostTag::class, 200)->create();
        factory(App\PostCategory::class, 50)->create();
 
    }
}
