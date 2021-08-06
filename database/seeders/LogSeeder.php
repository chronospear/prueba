<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logs')->insert([
            'commentary'=>'Documentandome sobre Tik Tok',
            'date'=>'2021-08-03',
            'tasks_id'=>'1',
        ]);  

        DB::table('logs')->insert([
            'commentary'=>'Comenzando a escribir el artículo',
            'date'=>'2021-08-03',
            'tasks_id'=>'1',
        ]);
    }
}
