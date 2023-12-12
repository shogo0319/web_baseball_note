<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('results')->insert([
            ['name' => '投ゴロ', 'type' => 1],
            ['name' => '投飛', 'type' => 1],
            ['name' => '投直', 'type' => 1],
            ['name' => '投邪飛', 'type' => 1],
            ['name' => '投併殺打', 'type' => 1],
            ['name' => '投安打', 'type' => 2],
            ['name' => '投二塁打', 'type' => 2],
            ['name' => '投三塁打', 'type' => 2],
            ['name' => '投本塁打', 'type' => 2],
            ['name' => '投犠打', 'type' => 6],
            ['name' => '投敵失', 'type' => 5],
            ['name' => '投犠飛', 'type' => 4],

            ['name' => '捕ゴロ', 'type' => 1],
            ['name' => '捕飛', 'type' => 1],
            ['name' => '捕直', 'type' => 1],
            ['name' => '捕邪飛', 'type' => 1],
            ['name' => '捕併殺打', 'type' => 1],
            ['name' => '捕安打', 'type' => 2],
            ['name' => '捕二塁打', 'type' => 2],
            ['name' => '捕三塁打', 'type' => 2],
            ['name' => '捕本塁打', 'type' => 2],
            ['name' => '捕犠打', 'type' => 6],
            ['name' => '捕敵失', 'type' => 5],
            ['name' => '投犠飛', 'type' => 4],

            ['name' => '一ゴロ', 'type' => 1],
            ['name' => '一飛', 'type' => 1],
            ['name' => '一直', 'type' => 1],
            ['name' => '一邪飛', 'type' => 1],
            ['name' => '一併殺打', 'type' => 1],
            ['name' => '一安打', 'type' => 2],
            ['name' => '一二塁打', 'type' => 2],
            ['name' => '一三塁打', 'type' => 2],
            ['name' => '一本塁打', 'type' => 2],
            ['name' => '一犠打', 'type' => 6],
            ['name' => '一敵失', 'type' => 5],
            ['name' => '一犠飛', 'type' => 4],

            ['name' => '二ゴロ', 'type' => 1],
            ['name' => '二飛', 'type' => 1],
            ['name' => '二直', 'type' => 1],
            ['name' => '二邪飛', 'type' => 1],
            ['name' => '二併殺打', 'type' => 1],
            ['name' => '二安打', 'type' => 2],
            ['name' => '二二塁打', 'type' => 2],
            ['name' => '二三塁打', 'type' => 2],
            ['name' => '二本塁打', 'type' => 2],
            ['name' => '二犠打', 'type' => 6],
            ['name' => '二敵失', 'type' => 5],
            ['name' => '二犠飛', 'type' => 4],

            ['name' => '三ゴロ', 'type' => 1],
            ['name' => '三飛', 'type' => 1],
            ['name' => '三直', 'type' => 1],
            ['name' => '三邪飛', 'type' => 1],
            ['name' => '三併殺打', 'type' => 1],
            ['name' => '三安打', 'type' => 2],
            ['name' => '三二塁打', 'type' => 2],
            ['name' => '三三塁打', 'type' => 2],
            ['name' => '三本塁打', 'type' => 2],
            ['name' => '三犠打', 'type' => 6],
            ['name' => '三敵失', 'type' => 5],
            ['name' => '三犠飛', 'type' => 4],

            ['name' => '遊ゴロ', 'type' => 1],
            ['name' => '遊飛', 'type' => 1],
            ['name' => '遊直', 'type' => 1],
            ['name' => '遊邪飛', 'type' => 1],
            ['name' => '遊併殺打', 'type' => 1],
            ['name' => '遊安打', 'type' => 2],
            ['name' => '遊二塁打', 'type' => 2],
            ['name' => '遊三塁打', 'type' => 2],
            ['name' => '遊本塁打', 'type' => 2],
            ['name' => '遊犠打', 'type' => 6],
            ['name' => '遊敵失', 'type' => 5],
            ['name' => '遊犠飛', 'type' => 4],

            ['name' => '左ゴロ', 'type' => 1],
            ['name' => '左飛', 'type' => 1],
            ['name' => '左直', 'type' => 1],
            ['name' => '左邪飛', 'type' => 1],
            ['name' => '左併殺打', 'type' => 1],
            ['name' => '左安打', 'type' => 2],
            ['name' => '左二塁打', 'type' => 2],
            ['name' => '左三塁打', 'type' => 2],
            ['name' => '左本塁打', 'type' => 2],
            ['name' => '左犠打', 'type' => 6],
            ['name' => '左敵失', 'type' => 5],
            ['name' => '左犠飛', 'type' => 4],

            ['name' => '中ゴロ', 'type' => 1],
            ['name' => '中飛', 'type' => 1],
            ['name' => '中直', 'type' => 1],
            ['name' => '中邪飛', 'type' => 1],
            ['name' => '中併殺打', 'type' => 1],
            ['name' => '中安打', 'type' => 2],
            ['name' => '中二塁打', 'type' => 2],
            ['name' => '中三塁打', 'type' => 2],
            ['name' => '中本塁打', 'type' => 2],
            ['name' => '中犠打', 'type' => 6],
            ['name' => '中敵失', 'type' => 5],
            ['name' => '中犠飛', 'type' => 4],

            ['name' => '右ゴロ', 'type' => 1],
            ['name' => '右飛', 'type' => 1],
            ['name' => '右直', 'type' => 1],
            ['name' => '右邪飛', 'type' => 1],
            ['name' => '右併殺打', 'type' => 1],
            ['name' => '右安打', 'type' => 2],
            ['name' => '右二塁打', 'type' => 2],
            ['name' => '右三塁打', 'type' => 2],
            ['name' => '右本塁打', 'type' => 2],
            ['name' => '右犠打', 'type' => 6],
            ['name' => '右敵失', 'type' => 5],
            ['name' => '右犠飛', 'type' => 4],

            ['name' => 'その他空三振', 'type' => 1],
            ['name' => 'その他見三振', 'type' => 1],
            ['name' => 'その他死球', 'type' => 3],
            ['name' => 'その他四球', 'type' => 3],
        ]);
    }
}
