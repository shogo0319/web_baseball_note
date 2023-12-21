<?php

namespace App\Http\Controllers;

use App\Models\BattingAverage;
use App\Models\BattingPoint;
use App\Models\OnBasePercentage;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function batting_average()
    {
        $battingAverages = BattingAverage::with('user')->orderBy('average', 'desc')->get();
        // dd($battingAverages);
        return view('batting_average', compact('battingAverages'));
    }

    public function on_base_percentage()
    {
        $onBasePercentages = OnBasePercentage::with('user')->orderBy('obp', 'desc')->get();
        // dd($onBasePercentages);
        return view('on_base_percentage', compact('onBasePercentages'));
    }

    public function batting_point()
    {
        $battingPoints = BattingPoint::with('user')->orderBy('point', 'desc')->get();
        return view('batting_point', compact('battingPoints'));
    }
}
