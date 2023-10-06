@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-5">
        <div class="text-center flex-grow-1">
            <h3 class="text-secondary">ノート一覧</h3>
        </div>
        <a href="{{ route('note_create') }}" class="btn btn-primary ml-3">新規作成</a>
    </div>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
            <th scope="col">日付</th>
            <th scope="col">タイトル</th>
            <th scope="col">素振り回数</th>
            <th scope="col">走った距離</th>
            <th scope="col">体重</th>
            <th scope="col">調子</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->created_at->format('Y-m-d') }}</td>
                <td>{{ $note->title }}</td>
                <td>{{ $note->swing }} 回</td>
                <td>{{ $note->running }} km</td>
                <td>{{ $note->weight }} kg</td>
                <td>{{ $note->condition }}</td>
                <td>
                    <a href="#" class="btn btn-warning">編集</a>
                    <form action="#" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
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
