@extends('layouts.leader')

@section('content')
@if (session('success'))
<div class="text-center">
    <div class="alert alert-success mt-3">
    {{ session('success') }}
    </div>
</div>
@endif

<div class="container">
    <div class="d-flex justify-content-between align-items-center my-5">
        <div class="text-center flex-grow-1">
            <h3 class="text-secondary">{{ $user->name }}のノート一覧</h3>
        </div>
    </div>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
            <th scope="">日付</th>
            <th scope="">タイトル</th>
            <th scope="">素振り回数</th>
            <th scope="">走った距離</th>
            <th scope="">体重</th>
            <th scope="">調子</th>
            <th scope="">詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->created_at->format('Y-m-d') }}</td>
                <td>{{ Str::limit($note->title, 20) }}</td>
                <td>{{ $note->swing }} 回</td>
                <td>{{ $note->running }} km</td>
                <td>{{ $note->weight }} kg</td>
                <td>{{ $note->condition }}</td>
                <td>
                    <a href="{{ route('players_note_detail', $note->id) }}" class="btn btn-outline-info">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ml-5">
        {{$notes->onEachSide(1)->links('pagination::bootstrap-4')}}
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('leader_players') }}" class="btn btn-outline-secondary">選手一覧に戻る</a>
    </div>
</div>
@endsection
