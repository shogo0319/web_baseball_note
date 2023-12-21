<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('result_kinds')->insert([
            ['name' => 'ゴロ'],
            ['name' => '飛'],
            ['name' => '直'],
            ['name' => '邪飛'],
            ['name' => '併殺打'],
            ['name' => '犠打'],
            ['name' => '安打'],
            ['name' => '二塁打'],
            ['name' => '三塁打'],
            ['name' => '本塁打'],
            ['name' => '敵失'],
            ['name' => '犠飛'],
            ['name' => '空三振'],
            ['name' => '見三振'],
            ['name' => '死球'],
            ['name' => '四球'],
        ]);
    }
}
