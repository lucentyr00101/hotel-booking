<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'   => 'Thor',
            'last_name'    => 'Odinson',
            'email'        => 'admin@email.com',
            'password'     => bcrypt('password'),
            'user_role_id' => 1,
        ]);
    }
}
