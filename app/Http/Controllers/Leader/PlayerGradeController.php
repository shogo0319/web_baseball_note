<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;

class PlayerGradeController extends Controller
{
    public function players_grades_index($user)
    {
        $user = User::where('id', $user)->first();
        $grades = Grade::where('user_id', $user->id)->latest()->paginate(10);

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

        return view('leader.players_grades_index', compact('user', 'grades', 'average', 'totalHits', 'totalAtBats', 'totalGames', 'totalRBIs', 'onBasePercentage'));
    }

    public function players_grades_show($id)
    {
        $grade = Grade::findOrFail($id);
        $dailyPerformance = $this->calculatePerformance($grade);
        return view('leader.players_grade_show', compact('grade', 'dailyPerformance'));
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
}
