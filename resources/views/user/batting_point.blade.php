@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
                <div class="text-center flex-grow-1">
                    <h3 class="text-secondary">打点ランキング</h3>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-5">
                <a href="{{ route('user.on_base_percentage') }}" class="btn btn-outline-success">出塁率ランキング</a>
                <a href="{{ route('user.batting_average') }}" class="btn btn-outline-success">打率ランキング</a>
                <a href="{{ route('user.practice_swing') }}" class="btn btn-outline-success">素振りランキング</a>
                <a href="{{ route('user.practice_running') }}" class="btn btn-outline-success">ランニング距離ランキング</a>
            </div>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">順位</th>
                        <th scope="col">名前</th>
                        <th scope="col">打点</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($battingPoints as $battingPoint)
                    <tr>
                        <td>{{ $loop->iteration }}位</td>
                        <td>{{ $battingPoint->user->name }}</td>
                        <td>{{ $battingPoint->point}}打点</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
