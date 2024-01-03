@extends('layouts.leader')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
                <div class="text-center flex-grow-1">
                    <h3 class="text-secondary">選手一覧</h3>
                </div>
            </div>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">選手</th>
                        <th scope="col">ノート一覧</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td><a href="{{route('players_notes_index', $user )}}" class="btn btn-outline-info">この選手のノート一覧へ</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
