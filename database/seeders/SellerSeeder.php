<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellers')->insert([
            'name'=>'Jon',
            'last_name'=>'Flex',
            'rut'=>'13434567-4',
        ]);   

        DB::table('sellers')->insert([
            'name'=>'Marcelo',
            'last_name'=>'Opazo',
            'rut'=>'1434557-4',
        ]); 

        DB::table('sellers')->insert([
            'name'=>'Macarena',
            'last_name'=>'Lopez',
            'rut'=>'16464646-9',
        ]); 
    }
}
