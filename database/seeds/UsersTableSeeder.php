<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'MD.Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'MD.Author',
            'username' => 'author',
            'email' => 'author@author.com',
            'password' => bcrypt('123123'),
        ]);
    }
}
