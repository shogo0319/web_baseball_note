@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $note->title }}</h1>

    <div class="card">
        <div class="card-header">詳細情報</div>
        <div class="card-body">
            <p><strong>タイトル:</strong> {{ $note->title }}</p>
            <p><strong>素振り回数:</strong> {{ $note->swing }} 回</p>
            <p><strong>走った距離:</strong> {{ $note->running }} km</p>
            <p><strong>体重:</strong> {{ $note->weight }} kg</p>
            <p><strong>調子:</strong> {{ $note->condition }}</p>
            <p><strong>場所:</strong> {{ $note->place }}</p>
            <p><strong>対戦相手:</strong> {{ $note->opponent }}</p>
            <p><strong>スコア:</strong> {{ $note->score }}</p>
            <p><strong>YouTubeリンク:</strong> <a href="{{ $note->youtube_link }}" target="_blank">{{ $note->youtube_link }}</a></p>
            <p><strong>メモ:</strong> {{ $note->memo }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('note_edit', $note->id) }}" class="btn btn-warning">編集</a>
        <a href="{{ route('notes_index') }}" class="btn btn-secondary">戻る</a>
    </div>
</div>
@endsection
