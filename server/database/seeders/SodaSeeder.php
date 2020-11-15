<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SodaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sodas')->insert([
            [
                'brand_id' => 1,
                'type_id' => 1,
                'flavor' => 'UVA',
                'litigation_id' => 1,
                'value_unit' => '1.5',
                'stock' => 10
            ],
            [
                'brand_id' => 1,
                'type_id' => 1,
                'flavor' => 'Morango',
                'litigation_id' => 1,
                'value_unit' => '1.5',
                'stock' => 10
            ],
            [
                'brand_id' => 3,
                'type_id' => 1,
                'flavor' => 'Cola',
                'litigation_id' => 1,
                'value_unit' => '1.5',
                'stock' => 10
            ],
            [
                'brand_id' => 2,
                'type_id' => 1,
                'flavor' => 'Laranja',
                'litigation_id' => 1,
                'value_unit' => '1.5',
                'stock' => 10
            ]
        ]);
    }
}
