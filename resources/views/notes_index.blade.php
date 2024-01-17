@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="text-center">
    <div class="alert alert-success mt-3">
    {{ session('success') }}
    </div>
</div>
@endif

<div class="container col-md-9">
    <div class="d-flex justify-content-between align-items-center my-5">
        <div class="text-center flex-grow-1">
            <h3 class="text-secondary">ノート一覧</h3>
        </div>
        <a href="{{ route('note_create') }}" class="btn btn-outline-primary">新規作成</a>
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
                    <a href="{{ route('note_detail', $note->id) }}" class="btn btn-outline-info">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ml-5">
        {{$notes->onEachSide(1)->links('pagination::bootstrap-4')}}
    </div>
</div>
@endsection
