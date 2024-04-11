@extends('layouts.user.app')

@section('content')
@if (session('success'))
<div class="text-center">
    <div class="alert alert-success mt-3">
    {{ session('success') }}
    </div>
</div>
@endif

<div class="container col-md-9">
    <div class="text-center mt-5">
        <h2 class="text-secondary">ノート一覧</h2>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('user.note_create') }}" class="btn btn-outline-primary">新規作成</a>
    </div>
    <div class="d-flex justify-content-end align-items-center">
        <div class="col-md-4">
            <form action="{{ route('user.notes_index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="search_date" value="{{ request('search_date') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">検索</button>
                    </div>
                </div>
            </form>
        </div>
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
                    <a href="{{ route('user.note_detail', $note->id) }}" class="btn btn-outline-info">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center my-5">
        {{$notes->onEachSide(1)->links('pagination::bootstrap-4')}}
    </div>
</div>
@endsection
