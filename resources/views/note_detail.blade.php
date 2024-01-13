@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success mt-3 text-center">
    {{ session('success') }}
</div>
@endif
<div class="container mt-5 mb-5 col-md-9">
    <div class="text-center">
        <h1 class="mb-5">
            <strong>タイトル：</strong>「{{ $note->title }}」
        </h1>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h4>{{ $note->created_at->format('Y-m-d') }}</h4>
            </div>
            <div class="text-center">
                <a href="{{ route('note_edit', $note->id) }}" class="btn btn-outline-warning">編集</a>
                <form action="{{ route('note_delete', $note->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('本当に削除してもよろしいですか？');">削除</button>
                </form>
                <a href="{{ route('notes_index') }}" class="btn btn-outline-secondary">一覧に戻る</a>
            </div>
        </div>
        <div class="card-body" style="font-size: 20px;">
            <p><strong>素振り回数：</strong>{{ $note->swing }} 回</p>
            <p><strong>走った距離：</strong>{{ $note->running }} km</p>
            <p><strong>体重：</strong>{{ $note->weight }} kg</p>
            <p><strong>調子：</strong>{{ $note->condition }}</p>
            <p><strong>YouTubeリンク：</strong><a href="{{ $note->youtube_link }}" target="_blank">{{ $note->youtube_link }}</a></p>
            <p><strong>メモ：</strong>{!! nl2br(e($note->memo)) !!}</p>
        </div>
    </div>
</div>

<hr>
<div class="container col-md-9">
    @foreach($note->comments as $comment)
        <div>
            <strong>
                @if($comment->leader_id == null)
                    {{ $comment->user->name }}  {{ $comment->user->created_at->format('Y-m-d H:i')}}
                @elseif($comment->user_id == null)
                    {{ $comment->leader->name }}  {{ $comment->leader->created_at->format('Y-m-d H:i') }}

                @endif
            </strong>
            <p>{{ $comment->comment }}</p>
        </div>
    @endforeach
    <div class="mt-5 mb-5 text-center form-floating">
        <form action="{{ route('comment_store', $note) }}" method="POST">
            @csrf
            <textarea class="form-control" name="comment" placeholder="コメントを入力" id="floatingTextarea2" style="height: 100px"></textarea>
            <div class="mt-3 mb-5">
                <button type="submit" class="btn btn-outline-success">コメントを作成</button>
            </div>
        </form>
    </div>
</div>


@endsection
