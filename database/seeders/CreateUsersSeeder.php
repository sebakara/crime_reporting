<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'=>'1',
            'name'=> 'admin',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin@gmail.com'),
        ]);

        DB::table('users')->insert([
            'role_id'=>'2',
            'name'=> 'police',
            'username'=>'police',
            'email'=>'police@gmail.com',
            'password'=>bcrypt('police@gmail.com'),
        ]);

        DB::table('users')->insert([
            'role_id'=>'3',
            'name'=> 'community',
            'username'=>'community',
            'email'=>'community@gmail.com',
            'password'=>bcrypt('community@gmail.com'),
        ]);
    }
}
