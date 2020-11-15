<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            ['type_name' => 'Lata'],
            ['type_name' => 'Garrafa Pet'],
            ['type_name' => 'Garrafa Vidro']
        ]);
    }
}
