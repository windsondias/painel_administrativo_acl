@extends('admin.template.base_login')

@section('title', 'Recupera Senha')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            {!! config('template.sidebar.logo_title') ??  "<b>Style</b>Tech"!!}
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <p class="login-box-msg">{{ __('Reset Password') }}</p>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                               placeholder="E-mail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" autocomplete="new-password" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                               autocomplete="new-password" placeholder="Confirme a senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Alterar senha</button>
                        </div>
                    </div>
                </form>
                @if (Route::has('login'))
                    <p class="mt-3 mb-1">
                        <a href="{{ route('login') }}">Login</a>
                    </p>
                @endif
            </div>
        </div>
    </div>

@endsection
