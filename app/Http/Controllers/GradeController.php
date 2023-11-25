<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        return view('grades_index');
    }



    public function create()
    {
        $positions = [
            '1' => 'ピッチャー',
            '2' => 'キャッチャー',
            '3' => 'ファースト',
            '4' => 'セカンド',
            '5' => 'サード',
            '6' => 'ショート',
            '7' => 'レフト',
            '8' => 'センター',
            '9' => 'ライト',
            '10' => 'その他',
        ];

        $results = [
            'a' => 'ゴロ',
            'b' => '飛',
            'c' => '直',
            'd' => '邪飛',
            'e' => '併殺打',
            'f' => '犠打',
            'g' => '安打',
            'h' => '二塁打',
            'i' => '三塁打',
            'j' => '本塁打',
            'k' => '敵失',
            'l' => '犠飛',
            'm' => '空三振',
            'n' => '見三振',
            'o' => '死球',
            'p' => '四球',
        ];

        $numberOfAtBats = 7;

        return view('grade_create', compact('positions', 'results', 'numberOfAtBats'));
    }

    public function store(Request $request)
    {
        $posts = $request->all();
        dd($posts);
        return view('grade_create');
    }
}
