@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
                <div class="text-center flex-grow-1">
                    <h3 class="text-secondary">打率ランキング</h3>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-5">
                <a href="{{ route('user.on_base_percentage') }}" class="btn btn-outline-success">出塁率ランキング</a>
                <a href="{{ route('user.batting_point') }}" class="btn btn-outline-success">打点ランキング</a>
                <a href="{{ route('user.practice_swing') }}" class="btn btn-outline-success">素振りランキング</a>
                <a href="{{ route('user.practice_running') }}" class="btn btn-outline-success">ランニング距離ランキング</a>
            </div>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">順位</th>
                        <th scope="col">名前</th>
                        <th scope="col">通算打率</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($battingAverages as $battingAverage)
                    <tr>
                        <td>{{ $loop->iteration }}位</td>
                        <td>{{ $battingAverage->user->name }}</td>
                        <td>{{ $battingAverage->average }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
