<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LitigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('litigations')->insert([
            ['value' => '100mL'],
            ['value' => '200mL'],
            ['value' => '300mL'],
            ['value' => '500mL'],
            ['value' => '1L'],
            ['value' => '1,5L'],
            ['value' => '2L']
        ]);
    }
}
