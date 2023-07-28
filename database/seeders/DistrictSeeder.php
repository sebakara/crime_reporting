<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            'district_name'=>'Gasabo',
        ]);

        DB::table('districts')->insert([
            'district_name'=>'Nyarugenge',
        ]);

        DB::table('districts')->insert([
            'district_name'=>'Kicukiro',
        ]);
    }
}
