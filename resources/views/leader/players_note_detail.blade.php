@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $note->title }}</h1>

    <div class="card">
        <div class="card-header">詳細情報</div>
        <div class="card-body">
            <p><strong>素振り回数:</strong> {{ $note->swing }} 回</p>
            <p><strong>走った距離:</strong> {{ $note->running }} km</p>
            <p><strong>体重:</strong> {{ $note->weight }} kg</p>
            <p><strong>調子:</strong> {{ $note->condition }}</p>
            <p><strong>YouTubeリンク:</strong> <a href="{{ $note->youtube_link }}" target="_blank">{{ $note->youtube_link }}</a></p>
            <p><strong>メモ:</strong><br> {!! nl2br(e($note->memo)) !!}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('players_notes_index' , $note->user->id) }}" class="btn btn-outline-secondary">一覧に戻る</a>
    </div>
</div>
@endsection
