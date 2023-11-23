@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <h3 class="my-5 text-secondary">個人成績入力フォーム</h3>
            </div>
            <form action="{{ route('grade_store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="date" class="form-label"><strong>試合日:</strong><span class="badge bg-danger">必須</label>
                    <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{date('Y-m-d')}}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="opponent" class="form-label"><strong>対戦相手:</strong><span class="badge bg-danger">必須</label>
                    <input type="text" name="opponent" id="opponent" class="form-control @error('opponent') is-invalid @enderror">
                    @error('opponent')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    @for ($i = 1; $i <= $numberOfAtBats; $i++)
                        <label for="grade" class="form-label"><strong>{{ $i }}打席目:</strong><span class="badge bg-secondary">任意</span></label><br>
                        <select name="position_{{ $i }}" id="position_{{ $i }}" style="width: 50%;" class="mb-3">
                            <option value="" disabled selected>打球方向を選択してください</option>
                            @foreach ($positions as $key => $position)
                                <option value="{{ $key }}">{{ $position }}</option>
                            @endforeach
                        </select>
                        <select name="result_{{ $i }}" id="result_{{ $i }}" style="width: 49%;">
                            <option value="" disabled selected>打撃結果を選択してください</option>
                            @foreach($results as $key => $result)
                                <option value="{{ $key }}">{{ $result }}</option>
                            @endforeach
                        </select>
                    @endfor
                </div>
                <div class="mb-5">
                    <label for="rbi" class="form-label"><strong>打点:</strong><span class="badge bg-danger">必須</label>
                    <input type="number" name="rbi" id="rbi" class="form-control @error('rbi') is-invalid @enderror" >
                    @error('rbi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <input type="submit" value="送信" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
