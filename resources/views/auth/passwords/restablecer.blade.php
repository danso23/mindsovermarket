@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></br>
            <div class="card">
                <div class="card-header title-header" style="color: #70b62c;">Actualizar contraseña</div>
                <div class="card-body">
                    <div class="small mb-3 text-muted"></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.actualizar') }}" id="formContrasenia">
                        @csrf
                        <div class="form-group row">
                            <label for="contraseniaActual" class="col-md-4 col-form-label text-md-right title-small label-form">Contraseña actual:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control custom-input @error('password') is-invalid @enderror" placeholder="Contraseña actual" name="contraseniaActual" required autofocus>
                                @error('contrasenia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contraseniaNueva" class="col-md-4 col-form-label text-md-right title-small label-form">Contraseña nueva:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control custom-input @error('password') is-invalid @enderror" placeholder="Contraseña nueva" name="contraseniaNueva" required autofocus>
                                @error('contrasenia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contraseniaNuevaConfirm" class="col-md-4 col-form-label text-md-right title-small label-form">Confirma tu nueva contraseña:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control custom-input @error('password') is-invalid @enderror" placeholder="Confirma la contraseña" name="contraseniaNuevaConfirm" required autofocus>
                                @error('contrasenia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                            <button type="submit" class="btn btn-primary" style="background-color:#bd2130">
                                    Actualizar
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
