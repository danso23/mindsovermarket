@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></br>
            <div class="card">
                <div class="card-header title-header" style="color: #70b62c;">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    <div class="small mb-3 text-muted">Ingresa tu usuario y te enviaremos un correo para recuperar tu contraseña.</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" id="frmMateriales">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right title-small label-form">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control custom-input @error('email') is-invalid @enderror" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                            <button type="submit" class="btn btn-primary" style="background-color:#bd2130">
                                    {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
