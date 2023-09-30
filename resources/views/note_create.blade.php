@extends('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center">
  <div class="container">
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
        <label for="practice" class="form-label">練習内容 <span class="badge bg-secondary">任意</span></label>
        <input type="text" class="form-control" id="practice" name="practice" placeholder="キャッチボール、ノック、シートバッティング...">
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
        <label for="place" class="form-label">場所 <span class="badge bg-secondary">任意</span></label>
        <input type="text" class="form-control" id="place" name="place" placeholder="甲子園球場">
    </div>
    <div class="mb-3">
        <label for="opponent" class="form-label">対戦相手 <span class="badge bg-secondary">任意</label>
        <input type="text" class="form-control" id="opponent" name="opponent" placeholder="阪神タイガース">
    </div>
    <div class="mb-3">
        <label for="score" class="form-label">試合結果 <span class="badge bg-secondary">任意</label>
        <input type="text" class="form-control" id="score" name="score" placeholder="１対０で辛勝">
    </div>
    <div class="mb-3">
        <label for="memo" class="form-label">今日の振り返り（気づきや学び、感想など自由に記述）<span class="badge bg-danger">必須</label>
        <textarea class="form-control @error('memo') is-invalid @enderror" id="memo" name="memo" rows="3" required></textarea>
        @error('condition')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
        <input type="submit" value="送信する">
        <input type="reset" value="リセット">
   </form>
  </div>
</div>

@endsection
