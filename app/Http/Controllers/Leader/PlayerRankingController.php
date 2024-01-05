<?php

namespace App\Http\Controllers\leader;

use App\Http\Controllers\Controller;
use App\Models\BattingAverage;
use App\Models\BattingPoint;
use App\Models\OnBasePercentage;
use App\Models\PracticeRunning;
use App\Models\PracticeSwing;
use Illuminate\Http\Request;

class PlayerRankingController extends Controller
{
    public function players_batting_average()
    {
        $battingAverages = BattingAverage::with('user')->orderBy('average', 'desc')->get();
        return view('leader.players_batting_average', compact('battingAverages'));
    }

    public function players_on_base_percentage()
    {
        $onBasePercentages = OnBasePercentage::with('user')->orderBy('obp', 'desc')->get();
        return view('leader.players_on_base_percentage', compact('onBasePercentages'));
    }

    public function players_batting_point()
    {
        $battingPoints = BattingPoint::with('user')->orderBy('point', 'desc')->get();
        return view('leader.players_batting_point', compact('battingPoints'));
    }

    public function players_practice_running()
    {
        $practiceRunnings = PracticeRunning::with('user')->orderBy('distant', 'desc')->get();
        return view('leader.players_practice_running', compact('practiceRunnings'));
    }

    public function players_practice_swing()
    {
        $practiceSwings = PracticeSwing::with('user')->orderBy('swing', 'desc')->get();
        return view('leader.players_practice_swing', compact('practiceSwings'));
    }
}
