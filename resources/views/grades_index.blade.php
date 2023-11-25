@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-warning text-center mb-5 mt-5">
                <div class="card-header">
                  <strong>通算成績</strong>
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
                    <h3 class="text-secondary">ノート一覧</h3>
                </div>
                    <a href="{{ route('grade_create') }}" class="btn btn-primary">新規作成</a>
            </div>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">日付</th>
                    <th scope="col">対戦相手</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#">3月19日</a></td>
                        <td>阪神タイガース</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
