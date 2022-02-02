@extends('layouts.app')

<link rel="stylesheet" href="/css/validationEngine.jquery.css" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/languages/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript"></script>
    <script type="text/javascript" src="js/all.js"></script>

    <style>   
        body{
            margin-right: auto;
            margin-left: auto;
            width: 600px;
        }
        .row{
            margin-top: 50px;
        }
        h1{
            text-align: center;
        }
        .btn{
            width: 200px;
            padding: 10px;
            box-sizing: border-box;
            cursor: pointer;
        }
    </style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Login') }}</h1></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="tickets_number" class="col-md-4 col-form-label text-md-end"><h3>{{ __('tickets_number') }}</h3></label>
                            <span style="color:navy;">10桁の接種券番号を入力してください。</span>

                            <div class="col-md-6">
                                <input id="tickets_number" placeholder="10桁の接種券番号を入力"　class="form-control @error('tickets_number') is-invalid @enderror" name="tickets_number" value="{{ old('tickets_number') }}" required autofocus>

                                @error('tickets_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><h3>{{ __('Password') }}</h3></label>
                            <span style="color:navy;">登録時に入力したパスワードを入力してください。</span>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="パスワードを入力"　class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button><br>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            新規登録は<a href="{{ route('register') }}">こちら</a>
        </div>
    </div>
</div>
@endsection
