<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
     
        DB::table('sectors')->insert([
            'district_id'=>'1',
            'sector_name'=>'Kacyiru',
        ]);

        DB::table('sectors')->insert([
            'district_id'=>'1',
            'sector_name'=>'Kimihurura',
        ]);

        DB::table('sectors')->insert([
            'district_id'=>'1',
            'sector_name'=>'Kimironko',
        ]);


        DB::table('sectors')->insert([
            'district_id'=>'2',
            'sector_name'=>'Kimisagara',
        ]);

        DB::table('sectors')->insert([
            'district_id'=>'2',
            'sector_name'=>'Muhima',
        ]);
       
        DB::table('sectors')->insert([
            'district_id'=>'2',
            'sector_name'=>'Nyamirambo',
        ]);
        
        DB::table('sectors')->insert([
            'district_id'=>'3',
            'sector_name'=>'Gatenga',
        ]);

        DB::table('sectors')->insert([
            'district_id'=>'3',
            'sector_name'=>'Kagarama',
        ]);

        DB::table('sectors')->insert([
            'district_id'=>'3',
            'sector_name'=>'Kanombe',
        ]);

    }
}
