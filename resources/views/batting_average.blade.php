@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
                <div class="text-center flex-grow-1">
                    <h3 class="text-secondary">打率ランキング</h3>
                </div>
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
