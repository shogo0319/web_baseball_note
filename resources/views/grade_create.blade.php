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
                    <label for="date" class="form-label"><strong>試合日 </strong><span class="badge bg-danger">必須</label>
                    <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{date('Y-m-d')}}">
                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="place" class="form-label"><strong>場所 </strong><span class="badge bg-danger">必須</label>
                    <input type="text" name="place" value="{{ old('place')}}" id="place" placeholder="（例）甲子園球場" class="form-control @error('place') is-invalid @enderror">
                    @error('place')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="opponent" class="form-label"><strong>対戦相手 </strong><span class="badge bg-danger">必須</label>
                    <input type="text" name="opponent" value="{{ old('opponent')}}" placeholder="（例）阪神タイガース" id="opponent" class="form-control @error('opponent') is-invalid @enderror">
                    @error('opponent')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-grow-1">
                        <label for="OwnScore" class="form-label"><strong>自チームスコア </strong><span class="badge bg-danger">必須</span></label>
                        <input type="number" name="OwnScore" value="{{ old('OwnScore')}}" placeholder="（例）5" id="OwnScore" min="0" class="form-control @error('OwnScore') is-invalid @enderror">
                        @error('OwnScore')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="px-4 mt-4" style="font-size: 50px;">-</div>

                    <div class="flex-grow-1">
                        <label for="OtherScore" class="form-label"><strong>相手チームスコア </strong><span class="badge bg-danger">必須</span></label>
                        <input type="number" name="OtherScore" value="{{ old('OtherScore')}}" placeholder="（例）3" id="OtherScore" min="0" class="form-control @error('OtherScore') is-invalid @enderror">
                        @error('OtherScore')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    @for ($i = 1; $i <= $numberOfAtBats; $i++)
                        <label for="grade" class="form-label"><strong>{{ $i }}打席目 </strong><span class="badge bg-secondary">任意</span></label><br>
                        <div class="d-flex justify-content-between">
                            <div class="w-100">
                                <select class="form-select mb-3" name="position_{{ $i }}" id="position_{{ $i }}">
                                    <option value="" disabled {{ old('position_' . $i) == null ? 'selected' : '' }}>打球方向を選択してください</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->name }}" {{ old('position_' . $i) == $position->name ? 'selected' : '' }}>{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-100">
                                <select class="form-select" name="result_{{ $i }}" id="result_{{ $i }}">
                                    <option value="" disabled {{ old('result_' . $i) == null ? 'selected' : '' }}>打撃結果を選択してください</option>
                                    @foreach($results as $result)
                                        <option value="{{ $result->name }}" {{ old('result_' . $i) == $result->name ? 'selected' : '' }}>{{ $result->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="mb-5">
                    <label for="rbi" class="form-label"><strong>打点 </strong><span class="badge bg-secondary">任意</span></label>
                    <input type="number" name="rbi" value="{{ old('rbi')}}" id="rbi" placeholder="（例）3" min="0" class="form-control @error('rbi') is-invalid @enderror">
                    @error('rbi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <input type="submit" value="作成" class="btn btn-outline-success">
                    <a href="{{ route('grades_index') }}" class="btn btn-outline-secondary">一覧に戻る</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
