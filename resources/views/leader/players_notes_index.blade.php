@extends('layouts.leader')

@section('content')
@if (session('success'))
<div class="text-center">
    <div class="alert alert-success mt-3">
    {{ session('success') }}
    </div>
</div>
@endif

<div class="container col-md-9">
    <div class="mt-5 mb-5 text-center">
        <h3 class="text-secondary">{{ $user->name }}のノート一覧</h3>
    </div>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
            <th scope="col">日付</th>
            <th scope="col">タイトル</th>
            <th scope="col">素振り回数</th>
            <th scope="col">走った距離</th>
            <th scope="col">詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->created_at->format('Y-m-d') }}</td>
                <td>{{ Str::limit($note->title, 20) }}</td>
                <td>{{ $note->swing }} 回</td>
                <td>{{ $note->running }} km</td>
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
