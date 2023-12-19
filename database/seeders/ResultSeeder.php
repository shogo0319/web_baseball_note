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
        DB::table('results')->delete();
        DB::table('results')->insert([
            ['name' => '投 ゴロ', 'type' => 1],
            ['name' => '投 飛', 'type' => 1],
            ['name' => '投 直', 'type' => 1],
            ['name' => '投 邪飛', 'type' => 1],
            ['name' => '投 併殺打', 'type' => 1],
            ['name' => '投 安打', 'type' => 2],
            ['name' => '投 二塁打', 'type' => 2],
            ['name' => '投 三塁打', 'type' => 2],
            ['name' => '投 本塁打', 'type' => 2],
            ['name' => '投 犠打', 'type' => 6],
            ['name' => '投 敵失', 'type' => 5],
            ['name' => '投 犠飛', 'type' => 4],

            ['name' => '捕 ゴロ', 'type' => 1],
            ['name' => '捕 飛', 'type' => 1],
            ['name' => '捕 直', 'type' => 1],
            ['name' => '捕 邪飛', 'type' => 1],
            ['name' => '捕 併殺打', 'type' => 1],
            ['name' => '捕 安打', 'type' => 2],
            ['name' => '捕 二塁打', 'type' => 2],
            ['name' => '捕 三塁打', 'type' => 2],
            ['name' => '捕 本塁打', 'type' => 2],
            ['name' => '捕 犠打', 'type' => 6],
            ['name' => '捕 敵失', 'type' => 5],
            ['name' => '投 犠飛', 'type' => 4],

            ['name' => '一 ゴロ', 'type' => 1],
            ['name' => '一 飛', 'type' => 1],
            ['name' => '一 直', 'type' => 1],
            ['name' => '一 邪飛', 'type' => 1],
            ['name' => '一 併殺打', 'type' => 1],
            ['name' => '一 安打', 'type' => 2],
            ['name' => '一 二塁打', 'type' => 2],
            ['name' => '一 三塁打', 'type' => 2],
            ['name' => '一 本塁打', 'type' => 2],
            ['name' => '一 犠打', 'type' => 6],
            ['name' => '一 敵失', 'type' => 5],
            ['name' => '一 犠飛', 'type' => 4],

            ['name' => '二 ゴロ', 'type' => 1],
            ['name' => '二 飛', 'type' => 1],
            ['name' => '二 直', 'type' => 1],
            ['name' => '二 邪飛', 'type' => 1],
            ['name' => '二 併殺打', 'type' => 1],
            ['name' => '二 安打', 'type' => 2],
            ['name' => '二 二塁打', 'type' => 2],
            ['name' => '二 三塁打', 'type' => 2],
            ['name' => '二 本塁打', 'type' => 2],
            ['name' => '二 犠打', 'type' => 6],
            ['name' => '二 敵失', 'type' => 5],
            ['name' => '二 犠飛', 'type' => 4],

            ['name' => '三 ゴロ', 'type' => 1],
            ['name' => '三 飛', 'type' => 1],
            ['name' => '三 直', 'type' => 1],
            ['name' => '三 邪飛', 'type' => 1],
            ['name' => '三 併殺打', 'type' => 1],
            ['name' => '三 安打', 'type' => 2],
            ['name' => '三 二塁打', 'type' => 2],
            ['name' => '三 三塁打', 'type' => 2],
            ['name' => '三 本塁打', 'type' => 2],
            ['name' => '三 犠打', 'type' => 6],
            ['name' => '三 敵失', 'type' => 5],
            ['name' => '三 犠飛', 'type' => 4],

            ['name' => '遊 ゴロ', 'type' => 1],
            ['name' => '遊 飛', 'type' => 1],
            ['name' => '遊 直', 'type' => 1],
            ['name' => '遊 邪飛', 'type' => 1],
            ['name' => '遊 併殺打', 'type' => 1],
            ['name' => '遊 安打', 'type' => 2],
            ['name' => '遊 二塁打', 'type' => 2],
            ['name' => '遊 三塁打', 'type' => 2],
            ['name' => '遊 本塁打', 'type' => 2],
            ['name' => '遊 犠打', 'type' => 6],
            ['name' => '遊 敵失', 'type' => 5],
            ['name' => '遊 犠飛', 'type' => 4],

            ['name' => '左 ゴロ', 'type' => 1],
            ['name' => '左 飛', 'type' => 1],
            ['name' => '左 直', 'type' => 1],
            ['name' => '左 邪飛', 'type' => 1],
            ['name' => '左 併殺打', 'type' => 1],
            ['name' => '左 安打', 'type' => 2],
            ['name' => '左 二塁打', 'type' => 2],
            ['name' => '左 三塁打', 'type' => 2],
            ['name' => '左 本塁打', 'type' => 2],
            ['name' => '左 犠打', 'type' => 6],
            ['name' => '左 敵失', 'type' => 5],
            ['name' => '左 犠飛', 'type' => 4],

            ['name' => '中 ゴロ', 'type' => 1],
            ['name' => '中 飛', 'type' => 1],
            ['name' => '中 直', 'type' => 1],
            ['name' => '中 邪飛', 'type' => 1],
            ['name' => '中 併殺打', 'type' => 1],
            ['name' => '中 安打', 'type' => 2],
            ['name' => '中 二塁打', 'type' => 2],
            ['name' => '中 三塁打', 'type' => 2],
            ['name' => '中 本塁打', 'type' => 2],
            ['name' => '中 犠打', 'type' => 6],
            ['name' => '中 敵失', 'type' => 5],
            ['name' => '中 犠飛', 'type' => 4],

            ['name' => '右 ゴロ', 'type' => 1],
            ['name' => '右 飛', 'type' => 1],
            ['name' => '右 直', 'type' => 1],
            ['name' => '右 邪飛', 'type' => 1],
            ['name' => '右 併殺打', 'type' => 1],
            ['name' => '右 安打', 'type' => 2],
            ['name' => '右 二塁打', 'type' => 2],
            ['name' => '右 三塁打', 'type' => 2],
            ['name' => '右 本塁打', 'type' => 2],
            ['name' => '右 犠打', 'type' => 6],
            ['name' => '右 敵失', 'type' => 5],
            ['name' => '右 犠飛', 'type' => 4],

            ['name' => 'その他 空三振', 'type' => 1],
            ['name' => 'その他 見三振', 'type' => 1],
            ['name' => 'その他 死球', 'type' => 3],
            ['name' => 'その他 四球', 'type' => 3],
        ]);
    }
}
