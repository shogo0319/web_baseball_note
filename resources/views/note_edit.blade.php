@extends('layouts.app')

@section('content')
<div class="container col-md-8">
    <div class="text-center">
        <h3 class="my-5 text-secondary">ノート編集フォーム</h3>
    </div>
    <form action="{{ route('note_update', $note->id) }}" method="post" novalidate>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label"><strong>タイトル </strong><span class="badge bg-danger">必須</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $note->title) }}" placeholder="タイトルを入力" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="swing" class="form-label"><strong>素振り回数 </strong><span class="badge bg-danger">必須</span></label>
            <input type="number" class="form-control @error('swing') is-invalid @enderror" id="swing" name="swing" value="{{ old('swing', $note->swing) }}" placeholder="素振り回数を入力" required>
            @error('swing')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="running" class="form-label"><strong>ランニング距離(km) </strong><span class="badge bg-danger">必須</span></label>
            <input type="number" class="form-control @error('running') is-invalid @enderror" id="running" name="running" value="{{ old('running', $note->running) }}" placeholder="ランニング距離を入力" step="0.1" required>
            @error('running')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="practice" class="form-label"><strong>その他の練習内容 </strong><span class="badge bg-secondary">任意</span></label>
            <input type="text" class="form-control" id="practice" name="practice" value="{{ old('practice', $note->practice) }}" placeholder="その他の練習内容を入力">
        </div>
        <div class="mb-3">
            <label for="youtube_link" class="form-label"><strong>YouTubeリンク </strong><span class="badge bg-secondary">任意</span></label>
            <input type="url" class="form-control" id="youtube_link" name="youtube_link" value="{{ old('youtube_link', $note->youtube_link) }}" placeholder="YouTubeリンクを入力">
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label"><strong>体重(kg) </strong><span class="badge bg-danger">必須</span></label>
            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight', $note->weight) }}" placeholder="体重を入力" step="0.1" required>
            @error('weight')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label"><strong>調子 </strong><span class="badge bg-danger">必須</span></label>
            <select class="form-control @error('condition') is-invalid @enderror" id="condition" name="condition" required>
                <option value="">選択してください</option>
                <option value="絶好調" {{ old('condition', $note->condition) == '絶好調' ? 'selected' : '' }}>絶好調</option>
                <option value="好調" {{ old('condition', $note->condition) == '好調' ? 'selected' : '' }}>好調</option>
                <option value="普通" {{ old('condition', $note->condition) == '普通' ? 'selected' : '' }}>普通</option>
                <option value="不調" {{ old('condition', $note->condition) == '不調' ? 'selected' : '' }}>不調</option>
                <option value="絶不調" {{ old('condition', $note->condition) == '絶不調' ? 'selected' : '' }}>絶不調</option>
            </select>
            @error('condition')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="memo" class="form-label"><strong>今日の振り返り（気づきや学び、感想など自由に記述）</strong><span class="badge bg-danger">必須</span></label>
            <textarea class="form-control @error('memo') is-invalid @enderror" id="memo" name="memo" rows="3" required>{{ old('memo', $note->memo) }}</textarea>
            @error('memo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center mt-5 mb-3">
            <input class="btn btn-outline-success" type="submit" value="更新する">
            <a href="{{ route('notes_index') }}" class="btn btn-outline-secondary">一覧に戻る</a>
        </div>
    </form>
</div>
@endsection
