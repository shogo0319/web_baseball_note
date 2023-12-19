<?php

namespace App\Http\Controllers;

use App\Models\BattingAverage;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function batting_average()
    {
        $battingAverages = BattingAverage::with('user')->orderBy('average', 'desc')->get();
        // dd($battingAverage);
        return view('batting_average', compact('battingAverages'));
    }
}
