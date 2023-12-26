@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success mt-3">
    {{ session('success') }}
</div>
@endif

<div class="d-flex flex-column justify-content-center align-items-center">
  <div class="container col-8">
    <div class="text-center">
        <h3 class="my-5 text-secondary">ノート編集フォーム</h3>
    </div>
    <form action="{{ route('note_update', $note->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">タイトル <span class="badge bg-danger">必須</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $note->title }}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="swing" class="form-label">素振り回数 <span class="badge bg-danger">必須</label>
            <input type="number" class="form-control @error('swing') is-invalid @enderror" id="swing" name="swing" value="{{ $note->swing }}" required>
            @error('swing')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="running" class="form-label">ランニング距離(km) <span class="badge bg-danger">必須</label>
            <input type="number" class="form-control @error('running') is-invalid @enderror" id="running" name="running" value="{{ $note->running }}" step="0.1" required>
            @error('running')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="practice" class="form-label">その他の練習内容 <span class="badge bg-secondary">任意</span></label>
            <input type="text" class="form-control" id="practice" name="practice" value="{{ $note->practice }}">
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">体重(kg) <span class="badge bg-danger">必須</label>
            <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ $note->weight }}" step="0.1" required>
            @error('weight')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label">調子 <span class="badge bg-danger">必須</label>
            <input type="text" class="form-control @error('condition') is-invalid @enderror" id="condition" name="condition" value="{{ $note->condition }}"required>
            @error('condition')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="memo" class="form-label">今日の振り返り（気づきや学び、感想など自由に記述）<span class="badge bg-danger">必須</label>
            <textarea class="form-control @error('memo') is-invalid @enderror" id="memo" name="memo" rows="3" required>{{ $note->memo }}</textarea>
            @error('condition')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center"><input class="btn btn-success" type="submit" value="更新する"></div>
    </form>
  </div>
</div>
@endsection
