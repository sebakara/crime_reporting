<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cells')->insert([
            'sector_id'=>'1',
            'cell_name'=>'Kamatamu',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'1',
            'cell_name'=>'Kamutwa',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'1',
            'cell_name'=>'Kibaza',
        ]);

     
        DB::table('cells')->insert([
            'sector_id'=>'2',
            'cell_name'=>'Kamukina',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'2',
            'cell_name'=>'Kimihurura',
        ]);
        DB::table('cells')->insert([
            'sector_id'=>'2',
            'cell_name'=>'Rugando',
        ]);
    
        DB::table('cells')->insert([
            'sector_id'=>'3',
            'cell_name'=>'Bibare',
        ]);
        DB::table('cells')->insert([
            'sector_id'=>'3',
            'cell_name'=>'Kibagabaga',
        ]);
        DB::table('cells')->insert([
            'sector_id'=>'3',
            'cell_name'=>'Nyagatovu',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'4',
            'cell_name'=>'Kamuhoza',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'4',
            'cell_name'=>'Katabaro',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'4',
            'cell_name'=>'Kimisagara',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'5',
            'cell_name'=>'Amahoro',
        ]);
        DB::table('cells')->insert([
            'sector_id'=>'5',
            'cell_name'=>'Kabeza',
        ]);
        DB::table('cells')->insert([
            'sector_id'=>'5',
            'cell_name'=>'Nyabugogo',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'6',
            'cell_name'=>'Cyivugiza ',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'6',
            'cell_name'=>'Gasharu',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'6',
            'cell_name'=>'Mumena',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'7',
            'cell_name'=>'Gatenga',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'7',
            'cell_name'=>'Karambo',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'7',
            'cell_name'=>'Nyanza',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'8',
            'cell_name'=>'Kanserege',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'8',
            'cell_name'=>'Muyange',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'8',
            'cell_name'=>'Rukatsa',
        ]);


        DB::table('cells')->insert([
            'sector_id'=>'9',
            'cell_name'=>'Busanza',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'9',
            'cell_name'=>'Kabeza',
        ]);

        DB::table('cells')->insert([
            'sector_id'=>'9',
            'cell_name'=>'Karama',
        ]);
        
    }
}
