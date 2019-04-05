<?php

use Illuminate\Database\Seeder;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'   => 'Hotel 1',
            'last_name'    => 'Manager',
            'email'        => 'hotel@email.com',
            'password'     => bcrypt('password'),
            'user_role_id' => 2,
        ]);

        DB::table('users')->insert([
            'first_name'   => 'Customer 1',
            'last_name'    => 'Surname',
            'email'        => 'customer@email.com',
            'password'     => bcrypt('password'),
            'user_role_id' => 3,
        ]);
    }
}
