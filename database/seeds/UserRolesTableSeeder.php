<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'user_role' => 'Super Admin'
        ]);

        DB::table('user_roles')->insert([
            'user_role' => 'Hotel Manager'
        ]);

        DB::table('user_roles')->insert([
            'user_role' => 'Customer'
        ]);
    }
}
