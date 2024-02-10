@extends('layouts.leader.app')

@section('content')
<div class="container col-md-9">
    <div class="mt-5 mb-5 text-center">
        <h3 class="text-secondary">選手一覧</h3>
    </div>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">名前</th>
                <th scope="col">ノート一覧</th>
                <th scope="col">成績一覧</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td><a href="{{route('leader.players_notes_index', $user )}}" class="btn btn-outline-info">この選手のノート一覧へ</a></td>
                <td><a href="{{route('leader.players_grades_index', $user )}}" class="btn btn-outline-info">この選手の成績一覧へ</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
