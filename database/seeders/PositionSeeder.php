<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            ['name' => '投'],
            ['name' => '捕'],
            ['name' => '一'],
            ['name' => '二'],
            ['name' => '三'],
            ['name' => '遊'],
            ['name' => '左'],
            ['name' => '中'],
            ['name' => '右'],
            ['name' => 'その他'],
        ]);
    }
}
