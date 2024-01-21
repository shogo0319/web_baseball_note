<?php

namespace App\Http\Controllers;

use App\Models\BattingAverage;
use App\Models\BattingPoint;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Game;
use App\Models\OnBasePercentage;
use App\Models\Position;


class GradeController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $grades = Grade::where('user_id', $userId)->get();

        $totalGames = $grades->count();
        $totalRBIs = $grades->sum('rbi');

        $totalHits = 0;
        $totalAtBats = 0;

        $totalForHitBalls = 0;
        $totalSacrificeFlies = 0;

        foreach ($grades as $grade)
        {
            $result = $grade->getHitsAndAtBats();
            $totalHits += $result['hits'];
            $totalAtBats += $result['atBats'];
            $ForHitBallsANDSacrificeFlies = $grade->getForHitBallsANDSacrificeFlies();
            $totalForHitBalls += $ForHitBallsANDSacrificeFlies['ForHitBalls'];
            $totalSacrificeFlies += $ForHitBallsANDSacrificeFlies['sacrificeFlies'];
        }
        // 条件 ? 真の場合の値 : 偽の場合の値;
        $average = $totalAtBats > 0 ? $totalHits / $totalAtBats : 0;

        $onBasePercentage = $totalAtBats + $totalForHitBalls + $totalSacrificeFlies > 0 ?
        ($totalHits + $totalForHitBalls) / ($totalAtBats + $totalForHitBalls + $totalSacrificeFlies) :0;

        return view('grades_index', compact('grades', 'average', 'totalHits', 'totalAtBats', 'totalGames', 'totalRBIs', 'onBasePercentage'));
    }


    public function create()
    {
        $positions = \DB::table('positions')->get();

        $results = \DB::table('result_kinds')->get();

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
        $grade->first_at_bat = $request->position_1 . ' ' . $request->result_1;
        $grade->second_at_bat = $request->position_2 . ' ' . $request->result_2;
        $grade->third_at_bat = $request->position_3 . ' ' . $request->result_3;
        $grade->fourth_at_bat = $request->position_4 . ' ' . $request->result_4;
        $grade->fifth_at_bat = $request->position_5 . ' ' . $request->result_5;
        $grade->sixth_at_bat = $request->position_6 . ' ' . $request->result_6;
        $grade->seventh_at_bat = $request->position_7 . ' ' . $request->result_7;
        $grade->rbi = $request->rbi;
        $grade->save();

        $grades = Grade::where('user_id', $userId)->get();
        $totalHits = 0;
        $totalAtBats = 0;
        $totalForHitBalls = 0;
        $totalSacrificeFlies = 0;
        foreach ($grades as $grade)
        {
            $result = $grade->getHitsAndAtBats();
            $totalHits += $result['hits'];
            $totalAtBats += $result['atBats'];
            $ForHitBallsANDSacrificeFlies = $grade->getForHitBallsANDSacrificeFlies();
            $totalForHitBalls += $ForHitBallsANDSacrificeFlies['ForHitBalls'];
            $totalSacrificeFlies += $ForHitBallsANDSacrificeFlies['sacrificeFlies'];
        }
        // 条件 ? 真の場合の値 : 偽の場合の値;
        $average = $totalAtBats > 0 ? round($totalHits / $totalAtBats, 3) : 0;
        BattingAverage::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['average' => $average] // 更新または作成する値
        );

        $onBasePercentage = $totalAtBats + $totalForHitBalls + $totalSacrificeFlies > 0 ?
        ($totalHits + $totalForHitBalls) / ($totalAtBats + $totalForHitBalls + $totalSacrificeFlies) :0;
        OnBasePercentage::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['obp' => $onBasePercentage] // 更新または作成する値
        );

        $totalRBIs = $grades->sum('rbi');
        BattingPoint::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['point' => $totalRBIs] // 更新または作成する値
        );

        return redirect( route('grades_index') )->with('success', '成績が作成されました！');
    }

    public function show($id)
    {
        $grade = Grade::where('game_id', $id)->first();

        $dailyPerformance = $this->calculatePerformance($grade);

        return view('grade_show', compact('grade', 'dailyPerformance'));
    }

    private function calculatePerformance($grade)
    {
        $totalHits = 0;
        $totalAtBats = 0;
        $totalRBIs = 0;
        $totalForHitBalls = 0;
        $totalSacrificeFlies = 0;

        $hitsAndAtBats = $grade->getHitsAndAtBats();
        $totalHits = $hitsAndAtBats['hits'];
        $totalAtBats = $hitsAndAtBats['atBats'];

        $totalRBIs += $grade->rbi;
        $ForHitBallsANDSacrificeFlies = $grade->getForHitBallsANDSacrificeFlies();
        $totalForHitBalls += $ForHitBallsANDSacrificeFlies['ForHitBalls'];
        $totalSacrificeFlies += $ForHitBallsANDSacrificeFlies['sacrificeFlies'];

        $average = $totalAtBats > 0 ? $totalHits / $totalAtBats : 0;

        $onBasePercentage = $totalAtBats + $totalForHitBalls + $totalSacrificeFlies > 0 ?
        ($totalHits + $totalForHitBalls) / ($totalAtBats + $totalForHitBalls + $totalSacrificeFlies) :
        0;

        return [
            'totalHits' => $totalHits,
            'totalAtBats' => $totalAtBats,
            'average' => $average,
            'onBasePercentage' => $onBasePercentage,
            'totalRBIs' => $totalRBIs,
            'totalForHitBalls' => $totalForHitBalls,
            'totalSacrificeFlies' => $totalSacrificeFlies,
        ];
    }

    public function edit($id)
    {
        $grade = Grade::where('game_id', $id)->first();

        $positions = \DB::table('positions')->get();
        $resultKinds = \DB::table('result_kinds')->get();
        $numberOfAtBats = 7;

        // カラム名に合わせて各打席のデータを分割し、配列に保存
        $atBats = [];
        for ($i = 1; $i <= $numberOfAtBats; $i++) {
            $atBatKey = match($i) {
                1 => 'first_at_bat',
                2 => 'second_at_bat',
                3 => 'third_at_bat',
                4 => 'fourth_at_bat',
                5 => 'fifth_at_bat',
                6 => 'sixth_at_bat',
                7 => 'seventh_at_bat',
                default => null
            };

            if ($atBatKey !== null) {
                $atBatParts = explode(' ', $grade->$atBatKey ?? '');
                $atBats[$i]['position'] = $atBatParts[0] ?? null;
                $atBats[$i]['result'] = $atBatParts[1] ?? null;
            }
        }

        return view('grade_edit', compact('grade', 'positions', 'resultKinds', 'numberOfAtBats', 'atBats'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'place' => 'required',
            'opponent' => 'required',
            'OwnScore' => 'required|integer|min:0',
            'OtherScore' => 'required|integer|min:0',
            'rbi' => 'integer|min:0',
        ]);
        $grade = Grade::where('game_id', $id)->first();
        $grade->update([
            'first_at_bat' => $request->position_1 . ' ' . $request->result_1,
            'second_at_bat' => $request->position_2 . ' ' . $request->result_2,
            'third_at_bat' => $request->position_3 . ' ' .$request->result_3,
            'fourth_at_bat' => $request->position_4 . ' ' . $request->result_4,
            'fifth_at_bat' => $request->position_5 . ' ' . $request->result_5,
            'sixth_at_bat' => $request->position_6 . ' ' . $request->result_6,
            'seventh_at_bat' => $request->position_7 . ' ' . $request->result_7,
            'rbi' => $request->rbi,
        ]);

        $userId = auth()->id();
        $grades = Grade::where('user_id', $userId)->get();
        $totalHits = 0;
        $totalAtBats = 0;
        $totalForHitBalls = 0;
        $totalSacrificeFlies = 0;
        foreach ($grades as $grade)
        {
            $result = $grade->getHitsAndAtBats();
            $totalHits += $result['hits'];
            $totalAtBats += $result['atBats'];
            $ForHitBallsANDSacrificeFlies = $grade->getForHitBallsANDSacrificeFlies();
            $totalForHitBalls += $ForHitBallsANDSacrificeFlies['ForHitBalls'];
            $totalSacrificeFlies += $ForHitBallsANDSacrificeFlies['sacrificeFlies'];
        }

        $average = $totalAtBats > 0 ? round($totalHits / $totalAtBats, 3) : 0;
        BattingAverage::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['average' => $average] // 更新または作成する値
        );

        $onBasePercentage = $totalAtBats + $totalForHitBalls + $totalSacrificeFlies > 0 ?
        ($totalHits + $totalForHitBalls) / ($totalAtBats + $totalForHitBalls + $totalSacrificeFlies) :0;
        OnBasePercentage::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['obp' => $onBasePercentage] // 更新または作成する値
        );

        $totalRBIs = $grades->sum('rbi');
        BattingPoint::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['point' => $totalRBIs] // 更新または作成する値
        );

        return redirect()->route('grade_show', $id)->with('success', '成績が更新されました！');
    }

    public function destroy($id)
    {
        $grade = Grade::where('game_id', $id)->first();
        $grade->delete();

        $userId = auth()->id();
        $grades = Grade::where('user_id', $userId)->get();
        $totalHits = 0;
        $totalAtBats = 0;
        $totalForHitBalls = 0;
        $totalSacrificeFlies = 0;
        foreach ($grades as $grade)
        {
            $result = $grade->getHitsAndAtBats();
            $totalHits += $result['hits'];
            $totalAtBats += $result['atBats'];
            $ForHitBallsANDSacrificeFlies = $grade->getForHitBallsANDSacrificeFlies();
            $totalForHitBalls += $ForHitBallsANDSacrificeFlies['ForHitBalls'];
            $totalSacrificeFlies += $ForHitBallsANDSacrificeFlies['sacrificeFlies'];
        }

        $average = $totalAtBats > 0 ? round($totalHits / $totalAtBats, 3) : 0;
        BattingAverage::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['average' => $average] // 更新または作成する値
        );

        $onBasePercentage = $totalAtBats + $totalForHitBalls + $totalSacrificeFlies > 0 ?
        ($totalHits + $totalForHitBalls) / ($totalAtBats + $totalForHitBalls + $totalSacrificeFlies) :0;
        OnBasePercentage::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['obp' => $onBasePercentage] // 更新または作成する値
        );

        $totalRBIs = $grades->sum('rbi');
        BattingPoint::updateOrCreate(
            ['user_id' => $userId], // 検索条件
            ['point' => $totalRBIs] // 更新または作成する値
        );

        return redirect('/grades')->with('success', '成績が削除されました！');
    }


}
