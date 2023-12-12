@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-warning text-center mb-5 mt-5">
                <div class="card-header">
                  <strong>通算成績</strong>
                </div>
                <div class="card-body" style="font-size: 30px;">
                    <div class="row">
                        <div class="col-md-4"><p>試合数: {{ $totalGames }}</p></div>
                        <div class="col-md-4"><p>打数: {{ $totalAtBats }}</p></div>
                        <div class="col-md-4"><p>安打数: {{ $totalHits }}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            @if($average > 0)
                                <p>打率: {{ number_format($average, 3) }}</p>
                            @else
                                <p>打率: 0.000</p>
                            @endif
                        </div>
                        <div class="col-md-4"><p>打点: {{ $totalRBIs }}</p></div>
                        <div class="col-md-4"><p>出塁率: {{ number_format($onBasePercentage, 3) }}</p></div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
                <div class="text-center flex-grow-1">
                    <h3 class="text-secondary">成績一覧</h3>
                </div>
                    <a href="{{ route('grade_create') }}" class="btn btn-primary">新規作成</a>
            </div>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">試合日</th>
                        <th scope="col">場所</th>
                        <th scope="col">対戦相手</th>
                        <th scope="col">スコア</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grades as $grade)
                    <tr>
                        <td><a href="/grade_detail">{{ $grade->game->game_at->format('Y/m/d') }}</a></td>
                        <td>{{ $grade->game->place }}</td>
                        <td>{{ $grade->game->opponent }}</td>
                        <td>{{ $grade->game->score }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
