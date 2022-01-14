@extends('layouts.app')

<link rel="stylesheet" href="/css/validationEngine.jquery.css" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/languages/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.pwdMeasure.min.js"></script>
    <script type="text/javascript"></script>
    <script type="text/javascript" src="js/all.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- 追加 -->
                        <div class="row mb-3">
                            <label for="tickets_number" class="col-md-4 col-form-label text-md-end">{{ __('tickets_number') }}</label>

                            <div class="col-md-6">
                                <input id="tickets_number" type="text" class="form-control" name="tickets_number" required>
                            </div>
                        </div>


                        <!-- <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('birthday') }}</label>

                            <div class="col-md-6">
                                <input id="year" class="form-control" name="year" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="month" class="col-md-4 col-form-label text-md-end">{{ __('birthday') }}</label>

                            <div class="col-md-6">
                                <input id="month" class="form-control" name="month" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('birthday') }}</label>

                            <div class="col-md-6">
                                <input id="date" class="form-control" name="date" required>
                            </div>
                        </div> -->
                        
                        <!-- <div class="row mb-3">
                            <div class="col-md-6">
                                <select id="year" name="year" class="form-control">
                                    <option value="">----</option>
                                </select> 年
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select id="month" name="month" class="form-control">
                                    <option value="">--</option>
                                </select> 月            
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select id="date" name="date" class="form-control">
                                    <option value="">--</option>
                                </select> 日  
                            </div>
                        </div> -->


                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('birthday') }}</label>
                            <select id="year" name="year" class="form-control">
                                <option value="">----</option>
                            </select>年                                            
                            <select id="month" name="month" class="form-control">
                                <option value="">--</option>
                            </select>月                                                        
                            <select id="date" name="date" class="form-control">
                                <option value="">--</option>
                            </select>日  
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
