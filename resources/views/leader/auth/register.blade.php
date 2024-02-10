@extends('layouts.leader.app')

@section('content')
<div class="container-fluid background-image-container" style="height: 100vh;">
    <div class="row justify-content-center align-items-center" style="height: 90vh;">
        <div class="col-md-6">
            <div class="text-center mb-5" style="color: #D3D3D3;">
                <h1><strong> 野 球 ノ ー ト</strong></h1>
            </div>
            <div class="card border-dark" style="background-color: rgba(0, 0, 0, 0.5); color:#D3D3D3; font-size: 1.3em; border-radius: 30px;">
                <div class="card-header text-center">
                    <strong>新規登録</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('leader.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus style="background-color: rgba(0, 0, 0, 0); color: #D3D3D3; border: 1px solid #D3D3D3;">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="background-color: rgba(0, 0, 0, 0); color: #D3D3D3; border: 1px solid #D3D3D3;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus style="background-color: rgba(0, 0, 0, 0); color: #D3D3D3; border: 1px solid #D3D3D3;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('確認用パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus style="background-color: rgba(0, 0, 0, 0); color: #D3D3D3; border: 1px solid #D3D3D3;">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="ol-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('新規登録') }}
                                </button>
                                <a href="{{ route('leader.login') }}" class="btn btn-primary">ログイン画面へ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .background-image-container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('/ログイン画像6.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        filter: blur(5px);
        z-index: -1;
    }

    .container-fluid {
        position: relative;
    }
</style>
@endsection
