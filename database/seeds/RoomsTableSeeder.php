<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'type_of_room' => 'SS - Standard Room',
            'rate'         => 2000,
            'max_cap'      => 2,
        ]);

        DB::table('rooms')->insert([
            'type_of_room' => 'ST - Standard Twin',
            'rate'         => 2500,
            'max_cap'      => 2,
        ]);

        DB::table('rooms')->insert([
            'type_of_room' => 'DD - Double Deluxe',
            'rate'         => 3000,
            'max_cap'      => 4,
        ]);

        DB::table('rooms')->insert([
            'type_of_room' => 'DS - Double Standard',
            'rate'         => 4000,
            'max_cap'      => 4,
        ]);

        DB::table('rooms')->insert([
            'type_of_room' => 'JS - Junior Suite',
            'rate'         => 6500,
            'max_cap'      => 6,
        ]);

        DB::table('rooms')->insert([
            'type_of_room' => 'ES - Executive Suite',
            'rate'         => 7500,
            'max_cap'      => 8,
        ]);
        
    }
}
