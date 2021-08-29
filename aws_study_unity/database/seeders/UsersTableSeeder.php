<?php

namespace Database\Seeders;

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
        //

        \App\Models\User::insert([
            'name'     => 'testName',
            'role_id'  => 2,
            'email'    => 'seedEmail' . '@email.com',
            'password' => bcrypt('secret')
        ]);

    }
}
