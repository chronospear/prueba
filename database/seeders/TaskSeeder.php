<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'name'=>'Escribir artículo sobre RRSS',
            'description'=>'abordar el impacto en pandemia.',
            'estimated_date'=>'2021-08-03',
            'max_date'=>'2021-08-05',
            'author_id'=>'2',
            'user_id'=>'2'
        ]); 
        
        DB::table('tasks')->insert([
            'name'=>'Programar un CRUD de productos',
            'description'=>'debe contener obligatoriamente una imagen del producto.',
            'estimated_date'=>'2021-08-06',
            'max_date'=>'2021-08-09',
            'author_id'=>'2',
            'user_id'=>'2'
        ]); 
    }
}
