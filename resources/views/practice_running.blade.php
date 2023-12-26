@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
                <div class="text-center flex-grow-1">
                    <h3 class="text-secondary">ランニングランキング</h3>
                </div>
            </div>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">順位</th>
                        <th scope="col">名前</th>
                        <th scope="col">距離</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($practiceRunnings as $practiceRunning)
                    <tr>
                        <td>{{ $loop->iteration }}位</td>
                        <td>{{ $practiceRunning->user->name }}</td>
                        <td>{{ $practiceRunning->distant }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
