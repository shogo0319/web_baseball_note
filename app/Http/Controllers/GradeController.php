<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Game;

class GradeController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); // ログインしているユーザーのIDを取得して変数$userIdに格納
        $grades = Grade::where('user_id', $userId)->get(); // Gradeモデルを使用して、ログインユーザーのIDに一致する成績データを取得

        $totalGames = $grades->count(); // 通算試合数 (gradesテーブルのレコード数)を計算
        $totalRBIs = $grades->sum('rbi'); // 通算打点　（gradesテーブルのrbiカラムの合計)

        $totalHits = 0; // ヒット数の合計を保持するための変数$totalHitsを0で初期化
        $totalAtBats = 0; // 打数の合計を保持するための変数$totalAtBatsを0で初期化

        $totalForHitBalls = 0; // 四死球の合計数を保持するための変数$totalForHitBallsを0で初期化
        $totalSacrificeFlies = 0; // 犠牲フライの合計数を保持するための変数$totalSacrificeFliesを0で初期化

        foreach ($grades as $grade) { // 取得した成績データ$gradesをループ処理
            $result = $grade->getHitsAndAtBats(); // 各成績からヒット数と打数を取得
            $totalHits += $result['hits']; // ヒット数を$totalHitsに加算
            $totalAtBats += $result['atBats']; // 打数を$totalAtBatsに加算

            $ForHitBallsANDSacrificeFlies = $grade->getForHitBallsANDSacrificeFlies(); // 四死球と犠牲フライの数を取得
            $totalForHitBalls += $ForHitBallsANDSacrificeFlies['ForHitBalls']; //四死球数を$totalForHitBallsに加算
            $totalSacrificeFlies += $ForHitBallsANDSacrificeFlies['sacrificeFlies']; //犠牲フライ数を$totalSacrificeFliesに加算
        }

        $average = $totalAtBats > 0 ? $totalHits / $totalAtBats : 0;
        // 打数が0より大きい場合の平均を計算、そうでなければ0

        $onBasePercentage = $totalAtBats + $totalForHitBalls + $totalSacrificeFlies > 0 ?
        ($totalHits + $totalForHitBalls) / ($totalAtBats + $totalForHitBalls + $totalSacrificeFlies) :
        0;// 出塁率を計算。分母（打数+四死球数+犠牲フライ数）が0より大きい場合に計算し、そうでなければ0


        return view('grades_index', compact('grades', 'average', 'totalHits', 'totalAtBats', 'totalGames', 'totalRBIs', 'onBasePercentage'));
    }


    public function create()
    {
        $positions = [
            '1' => '投',
            '2' => '捕',
            '3' => '一',
            '4' => '二',
            '5' => '三',
            '6' => '遊',
            '7' => '左',
            '8' => '中',
            '9' => '右',
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
        $request->validate([
            'date' => 'required|date',
            'place' => 'required',
            'opponent' => 'required',
            'OwnScore' => 'required|integer|min:0',
            'OtherScore' => 'required|integer|min:0',
            'rbi' => 'integer|min:0',
        ],[
            'date.required' => '日付は必須です',
            'date.date' => '有効な日付を入力してください',
            'place.required' => '場所は必須です',
            'opponent.required' => '対戦相手は必須です',
            'OwnScore.required' => '自チームスコアは必須',
            'OwnScore.integer' => '有効な数字を入力してください',
            'OwnScore.min:0' => '有効な数字を入力してください',
            'OtherScore.required' => '相手チームスコアは必須です',
            'OtherScore.integer' => '有効な数字を入力してください',
            'OtherScore.min:0' => '有効な数字を入力してください',
            'rbi.integer' => '有効な数字を入力してください',
            'rbi.min:0' => '有効な数字を入力してください',
        ]);

        $game = new Game();
        $game->game_at = $request->date;
        $game->place = $request->place;
        $game->opponent = $request->opponent;
        $game->score = $request->OwnScore . '-' . $request->OtherScore;
        $game->save();

        $userId = auth()->id();

        $grade = new Grade();
        $grade->user_id = $userId;
        $grade->game_id = $game->id;
        $grade->first_at_bat = $request->position_1 . $request->result_1;
        $grade->second_at_bat = $request->position_2 . $request->result_2;
        $grade->third_at_bat = $request->position_3 . $request->result_3;
        $grade->fourth_at_bat = $request->position_4 . $request->result_4;
        $grade->fifth_at_bat = $request->position_5 . $request->result_5;
        $grade->sixth_at_bat = $request->position_6 . $request->result_6;
        $grade->seventh_at_bat = $request->position_7 . $request->result_7;
        $grade->rbi = $request->rbi;
        $grade->save();

        return redirect( route('grades_index') )->with('success', '成績が作成されました！');
    }

        public function detail()
    {
        return view('grade_detail');
    }

}
