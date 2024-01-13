<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Result;


class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $fillable = [
        'user_id', 'game_id', 'first_at_bat', 'second_at_bat', 'third_at_bat','fourth_at_bat', 'fifth_at_bat', 'sixth_at_bat', 'seventh_at_bat', 'rbi'
    ];
    //定数
    const GRADE_TYPES = [
        1 => 'アウト',
        2 => 'ヒット',
        3 => '四死球',
        4 => '犠飛',
        5 => '敵失',
        6 => 'その他'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHitsAndAtBats()
    {
        $hits = 0;
        $atBats = 0;

        $atBatNames = ['first_at_bat', 'second_at_bat', 'third_at_bat', 'fourth_at_bat', 'fifth_at_bat', 'sixth_at_bat', 'seventh_at_bat'];

        foreach ($atBatNames as $atBatName) {
            $atBatResultName = $this->{$atBatName};
            if ($atBatResultName) {
                $result = Result::where('name', $atBatResultName)->first();
                if ($result) {
                    if (in_array($result->type, [1, 2, 5])) {
                        $atBats++;
                    }
                    if ($result->type == 2) {
                        $hits++;
                    }
                }
            }
        }

        return ['hits' => $hits, 'atBats' => $atBats];
    }

    public function getForHitBallsANDSacrificeFlies()
    {
        $ForHitBalls = 0;
        $sacrificeFlies = 0;

        //$atBatNamesは使えない？
        foreach (['first_at_bat', 'second_at_bat', 'third_at_bat', 'fourth_at_bat', 'fifth_at_bat', 'sixth_at_bat', 'seventh_at_bat'] as $atBat) {
            $result = Result::where('name', $this->{$atBat})->first();
            if ($result) {
                if ($result->type == 3) {
                    $ForHitBalls++;
                } elseif ($result->type == 4) {
                    $sacrificeFlies++;
                }
            }
        }

        return ['ForHitBalls' => $ForHitBalls, 'sacrificeFlies' => $sacrificeFlies];
    }
}
