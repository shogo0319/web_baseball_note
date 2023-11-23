@extends('layouts.app')

@section('content')
<div class="text-center">
    <h3 class="my-5 text-secondary">個人成績入力フォーム</h3>
</div>
<form method="post" action="{#}">
    @csrf
    @for ($i = 1; $i <= 6; $i++)
        <div style="display: flex; align-items: center; justify-content: center;">
            <strong style="margin-right: 50px; font-size: 25px ">{{ $i }}打席目</strong>
            <select class="form-select form-select-lg mb-3" style="width: 25%;" aria-label=".form-select-lg example" >
                <option selected></option>
                <option value="1">投</option>
                <option value="2">捕</option>
                <option value="3">一</option>
                <option value="4">二</option>
                <option value="5">三</option>
                <option value="6">遊</option>
                <option value="7">左</option>
                <option value="8">中</option>
                <option value="9">右</option>
                <option value="10">その他</option>
            </select>

            <select class="form-select form-select-lg mb-3" style="width: 25%;" aria-label=".form-select-lg example" style="margin-left: 20px;">
                <option selected></option>
                <option value="1">ゴロ</option>
                <option value="2">飛</option>
                <option value="3">直</option>
                <option value="4">邪飛</option>
                <option value="5">併殺打</option>
                <option value="6">犠打</option>
                <option value="7">安打</option>
                <option value="7">二塁打</option>
                <option value="7">三塁打</option>
                <option value="7">本塁打</option>
                <option value="7">敵失</option>
                <option value="7">犠飛</option>
            </select>
        </div>
    @endfor
<div style="display: flex; align-items: center; justify-content: center;">
    <strong style="margin-right: 50px; font-size: 25px">打点</strong>
    <input type="number" name="rbi" class="form-control" style="width: 25%;" placeholder="打点を入力">
</div>
<div class="text-center mt-4">
    <button type="submit" class="btn btn-primary">送信</button>
</div>
@endsection
