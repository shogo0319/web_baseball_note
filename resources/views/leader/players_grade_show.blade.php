@extends('layouts.leader')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="text-center">
        <div class="alert alert-success mt-3">
        {{ session('success') }}
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-warning text-center mb-5 mt-5">
                <div class="card-header" style="font-size: 20px;">
                    <strong>{{ $grade->game->game_at->format('Y年m月d日') }}の成績</strong>
                </div>
                <div class="card-body" style="font-size: 30px;" >
                    <div class="row">
                        <div class="col-md-6">
                            <p><span>打率：</span>{{ number_format($dailyPerformance['average'], 3) }}</p>
                            <p><span>出塁率：</span>{{ number_format($dailyPerformance['onBasePercentage'], 3) }}</p>
                            <p><span>打席数：</span>{{ $dailyPerformance['totalAtBats'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><span>安打数：</span>{{ $dailyPerformance['totalHits'] }}</p>
                            <p><span>打点：</span>{{ $dailyPerformance['totalRBIs'] }}</p>
                            <p><span>四死球：</span>{{ $dailyPerformance['totalForHitBalls'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
                <div class="text-center flex-grow-1">
                    <h3 class="text-secondary">成績詳細</h3>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center"><strong>詳細情報</strong></div>
                <div class="card-body" style="font-size: 30px; margin-left: 50px;">
                    <p><strong>試合日：{{ $grade->game->game_at->format('Y年m月d日') }}</strong></p>
                    <p><strong>場所：{{ $grade->game->place }}</strong></p>
                    <p><strong>対戦相手：{{ $grade->game->opponent }}</strong></p>
                    <p><strong>スコア：{{ $grade->game->score }}</strong></p>
                    <p><strong>1打席目：{{ $grade->first_at_bat }}</strong></p>
                    <p><strong>2打席目：{{ $grade->second_at_bat }}</strong></p>
                    <p><strong>3打席目：{{ $grade->third_at_bat }}</strong></p>
                    <p><strong>4打席目：{{ $grade->fourth_at_bat }}</strong></p>
                    <p><strong>5打席目：{{ $grade->fifth_at_bat }}</strong></p>
                    <p><strong>6打席目：{{ $grade->sixth_at_bat }}</strong></p>
                    <p><strong>7打席目：{{ $grade->seventh_at_bat }}</strong></p>

                    <p><strong>打点：{{ $grade->rbi }}</strong></p>
                </div>
            </div>
            <div class="text-center mt-5 mb-5">
                <a href="{{ route('players_grades_index', $grade->user->id) }}" class="btn btn-outline-secondary">成績一覧に戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection
