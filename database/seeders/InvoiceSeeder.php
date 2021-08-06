<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert([
            'date'=>'2021-08-05',
            'type'=>'electronica',
            'user_id'=>'3',
            'seller_id'=>'2',
        ]); 


        
        DB::table('invoices')->insert([
            'date'=>'2021-08-05',
            'type'=>'honorarios',
            'user_id'=>'3',
            'seller_id'=>'2',
        ]); 

        
        DB::table('invoices')->insert([
            'date'=>'2021-08-05',
            'type'=>'electronica',
            'user_id'=>'1',
            'seller_id'=>'3',
        ]); 

    }
}
