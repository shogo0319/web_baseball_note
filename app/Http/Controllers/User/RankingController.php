<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BattingAverage;
use App\Models\BattingPoint;
use App\Models\OnBasePercentage;
use App\Models\PracticeRunning;
use App\Models\PracticeSwing;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function batting_average()
    {
        $battingAverages = BattingAverage::with('user')->orderBy('average', 'desc')->get();

        return view('user.batting_average', compact('battingAverages'));
    }

    public function on_base_percentage()
    {
        $onBasePercentages = OnBasePercentage::with('user')->orderBy('obp', 'desc')->get();

        return view('user.on_base_percentage', compact('onBasePercentages'));
    }

    public function batting_point()
    {
        $battingPoints = BattingPoint::with('user')->orderBy('point', 'desc')->get();

        return view('user.batting_point', compact('battingPoints'));
    }

    public function practice_running()
    {
        $practiceRunnings = PracticeRunning::with('user')->orderBy('distant', 'desc')->get();

        return view('user.practice_running', compact('practiceRunnings'));
    }

    public function practice_swing()
    {
        $practiceSwings = PracticeSwing::with('user')->orderBy('swing', 'desc')->get();

        return view('user.practice_swing', compact('practiceSwings'));
    }
}
