@extends('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="container col-8">
        <div class="text-center">
            <h3 class="my-5 text-secondary">ノート作成フォーム</h3>
        </div>
    <form action="{{ route('note_store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">タイトル <span class="badge bg-danger">必須</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="日本１まであと１勝！" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="swing" class="form-label">素振り回数 <span class="badge bg-danger">必須</label>
            <input type="number" class="form-control @error('swing') is-invalid @enderror" id="swing" name="swing" placeholder="50" required>
            @error('swing')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="running" class="form-label">ランニング距離(km) <span class="badge bg-danger">必須</label>
            <input type="number" class="form-control @error('running') is-invalid @enderror" id="running" name="running" placeholder="3" step="0.1" required>
            @error('running')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="practice" class="form-label">その他の練習内容 <span class="badge bg-secondary">任意</span></label>
            <input type="text" class="form-control" id="practice" name="practice" placeholder="キャッチボール、ノック、シートバッティング...">
        </div>
        <div class="mb-3">
            <label for="youtube_link" class="form-label">YouTubeリンク <span class="badge bg-secondary">任意</span></label>
            <input type="url" class="form-control" id="youtube_link" name="youtube_link" placeholder="https://www.xxx.baseball_note.jp">
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">体重(kg) <span class="badge bg-danger">必須</label>
            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" placeholder="70.5" step="0.1" required>
            @error('weight')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label">調子 <span class="badge bg-danger">必須</label>
            <input type="text" class="form-control @error('condition') is-invalid @enderror" id="condition" name="condition" placeholder="絶好調、不調..." required>
            @error('condition')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="memo" class="form-label">今日の振り返り（気づきや学び、感想など自由に記述）<span class="badge bg-danger">必須</label>
            <textarea class="form-control @error('memo') is-invalid @enderror" id="memo" name="memo" rows="3" required></textarea>
            @error('condition')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center mt-5 mb-3">
            <input class="btn btn-outline-success" type="submit" value="作成する">
            <a href="{{ route('notes_index') }}" class="btn btn-outline-secondary">一覧に戻る</a>
        </div>
    </form>
    </div>
</div>
@endsection
