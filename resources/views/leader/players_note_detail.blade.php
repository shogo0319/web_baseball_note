@extends('layouts.leader')

@section('content')
@if (session('success'))
<div class="text-center">
    <div class="alert alert-success mt-3">
    {{ session('success') }}
    </div>
</div>
@endif
<div class="container mt-5 mb-5 col-md-9">
    <div class="text-center">
        <h5><strong>タイトル</strong></h5>
        <h1 class="mb-5" style="word-wrap: break-word;">
            「{{ $note->title }}」
        </h1>
    </div>
    <div class="card card border-dark">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h4>{{ $note->created_at->format('Y-m-d') }}</h4>
            </div>
            <div class="text-center">
                <a href="{{ route('players_notes_index', ['user' => $user->id]) }}" class="btn btn-outline-secondary">ノート一覧へ戻る</a>
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
        <div class="d-flex justify-content-center">
            <div class="card card border-dark mt-3 mb-3" style="width: 50rem;">
                <div class="card-header d-flex justify-content-between" style="font-size: 18px;">
                    <div class="flex-grow-1">
                        <strong>{{ $comment->poster->name }}</strong>
                    </div>
                    <div class="flex-grow-1 text-center">
                        {{ $comment->created_at->format('Y-m-d H:i') }}
                    </div>
                    <div class="flex-grow-1 text-end">
                        @if(auth()->id() == $comment->leader_id)
                            <form action="{{ route('leader.comment_destroy', ['note' => $note->id, 'comment' => $comment->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('本当に削除してもよろしいですか？');">
                                    削除
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <p>{!! nl2br(e($comment->comment)) !!}</p>
                </div>
            </div>
        </div>
    @endforeach
    <div class="mt-5 mb-5 text-center form-floating">
        <form action="{{ route('leader.comment_store', $note) }}" method="POST">
            @csrf
            <textarea class="form-control" name="comment" placeholder="コメントを入力" id="floatingTextarea2" style="height: 100px"></textarea>
            <div class="mt-3 mb-5">
                <button type="submit" class="btn btn-outline-success">コメントを作成</button>
            </div>
        </form>
    </div>
</div>


@endsection
