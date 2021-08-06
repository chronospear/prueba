<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=>'Balon de futbol',
            'quantity'=>'100',
            'price'=>'9990',
            'invoice_id'=>'3',
        ]); 


        DB::table('products')->insert([
            'name'=>'Peaky Blinders - Nintendo Switch',
            'quantity'=>'50',
            'price'=>'49990',
            'invoice_id'=>'1',
        ]); 


        DB::table('products')->insert([
            'name'=>'Apple AirPods  ',
            'quantity'=>'5',
            'price'=>'99990',
            'invoice_id'=>'2',
        ]); 

    }
}
