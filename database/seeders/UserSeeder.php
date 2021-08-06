<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Cesar',
            'last_name'=>'Henriquez',
            'rut'=>'1234567-9',
            'email'=> 'critics@gmail.com',
            'password' => Hash::make('123456'),
        ]);    

        DB::table('users')->insert([
            'name'=>'Lauren',
            'last_name'=>'Perez',
            'rut'=>'16354567-9',
            'email'=> 'lperez@gmail.com',
            'password' => Hash::make('123456'),
        ]); 

        DB::table('users')->insert([
            'name'=>'Beth',
            'last_name'=>'Harmon',
            'rut'=>'16376867-9',
            'email'=> 'mattep@gmail.com',
            'password' => Hash::make('123456'),
        ]);

    }
}
