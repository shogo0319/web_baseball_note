<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Result; // Result モデルをインポート


class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades'; // 使用するテーブル名を指定

    protected $fillable = [ // モデルで扱うことができる属性を定義
        'user_id', 'game_id', 'first_at_bat', 'second_at_bat', 'third_at_bat','fourth_at_bat', 'fifth_at_bat', 'sixth_at_bat', 'seventh_at_bat', 'rbi'
    ];

    const GRADE_TYPES = [ // 成績の種類を定義した定数
        1 => 'アウト',
        2 => 'ヒット',
        3 => '四死球',
        4 => '犠飛',
        5 => '敵失',
        6 => 'その他'
    ];

    public function game() // Gameモデルとのリレーションを定義
    {
        return $this->belongsTo(Game::class);
    }


    public function getHitsAndAtBats()// 通算の安打数と打数を取得する関数
    {
        $hits = 0; // 安打数を数える変数
        $atBats = 0; // 打席数を数える変数

        // 打席の名前の配列
        $atBatNames = ['first_at_bat', 'second_at_bat', 'third_at_bat', 'fourth_at_bat', 'fifth_at_bat', 'sixth_at_bat', 'seventh_at_bat'];


        foreach ($atBatNames as $atBatName) { // それぞれの打席についてのループ処理
            $atBatResultName = $this->{$atBatName}; // 現在の打席の結果を取得

            if ($atBatResultName) { //打席の結果が存在する場合
                $result = Result::where('name', $atBatResultName)->first(); // Result テーブルから対応する type を取得
                if ($result) { //上記の結果が存在する場合
                    if (in_array($result->type, [1, 2, 5])) {
                        $atBats++; //結果のタイプが1または2または5の場合、打席を1数える
                    }
                    if ($result->type == 2) {
                        $hits++; //結果のタイプが２の場合、安打を　1数える
                    }
                }
            }
        }

        return ['hits' => $hits, 'atBats' => $atBats]; // 安打数と打数を配列で返す
    }

    public function getForHitBallsANDSacrificeFlies()// 四死球と犠飛の数を取得する関数
    {
        $ForHitBalls = 0; // 四死球数を数える変数
        $sacrificeFlies = 0; // 犠飛数を数える変数

        foreach (['first_at_bat', 'second_at_bat', 'third_at_bat', 'fourth_at_bat', 'fifth_at_bat', 'sixth_at_bat', 'seventh_at_bat'] as $atBat) {
            $result = Result::where('name', $this->{$atBat})->first(); // 各打席の結果を取得
            if ($result) {
                if ($result->type == 3) {
                    $ForHitBalls++; // 四球または死球の場合
                } elseif ($result->type == 4) {
                    $sacrificeFlies++; // 犠飛の場合
                }
            }
        }

        return ['ForHitBalls' => $ForHitBalls, 'sacrificeFlies' => $sacrificeFlies]; // 四死球数と犠飛数を配列で
    }
}
