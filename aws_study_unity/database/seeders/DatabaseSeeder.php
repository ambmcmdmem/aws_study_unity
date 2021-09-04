<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        // $this->call(UsersTableSeeder::class);

        // \App\Models\User::factory(10)->create();
        // \App\Models\User::truncate();
        // \App\Models\User::factory(10)->create();
        // \App\Models\Role::factory(1)->create();

        // \App\Models\User::insert([
            
        // ]);
        \App\Models\User::factory(100)->create()->each(function($user) {
            $user->posts()->save(\App\Models\Post::factory()->make());
        });
    }
}
