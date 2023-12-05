@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-warning text-center mb-5 mt-5">
                <div class="card-header">
                    <strong>○月○日の成績</strong>
                </div>
                <div class="card-body" style="font-size: 30px;" >
                    <div class="row">
                        <div class="col-md-6">
                            <p><span class="text-secondary">打率　</span><u>.333</u></p>
                            <p><span class="text-secondary">出塁率　</span><u>.333</u></p>
                            <p><span class="text-secondary">ホームラン　</span><u>5</u></p>
                        </div>
                        <div class="col-md-6">
                            <p><span class="text-secondary">安打数　</span><u>50</u></p>
                            <p><span class="text-secondary">打点　</span><u>30</u></p>
                            <p><span class="text-secondary">四死球　</span><u>10</u></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
                <div class="text-center flex-grow-1">
                    <h3 class="text-secondary">成績詳細</h3>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center"><strong>詳細情報</strong></div>
                <div class="card-body text-secondary" style="font-size: 30px; margin-left: 50px;">
                    <p><strong>試合日：</strong></p>
                    <p><strong>対戦相手：</strong></p>
                    <p><strong>1打席目:</strong></p>
                    <p><strong>2打席目:</strong></p>
                    <p><strong>3打席目:</strong></p>
                    <p><strong>4打席目:</strong></p>
                    <p><strong>5打席目:</strong></p>
                    <p><strong>6打席目:</strong></p>
                    <p><strong>7打席目:</strong></p>
                    <p><strong>打点:</strong></p>
                </div>
            </div>
            <div class="mt-4" style="display: flex; justify-content: center;">
                <a href="#" class="btn btn-warning">編集</a>
                <a href="#" class="btn btn-secondary">戻る</a>
            </div>

        </div>
    </div>
</div>
@endsection
