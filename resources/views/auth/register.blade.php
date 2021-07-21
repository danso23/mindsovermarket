@extends('layouts.template_register')

@section('content')
<div class="container">
    <div class="row h-100 justify-content-center">
        <div class="col-5 col-sm-5 col-md-6 col-lg-6">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('public/img/Imagenes/DF-registro001.jpg') }}" class="img-register" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 content-register-right align-self-center text-center">
            @if ($errors->any())
            <div class="errors">
                <p><strong>Por favor corrige los siguientes errores</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="list-style:none;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <h2>REGISTRATE</h2>
                <p>Únete a nuestra plataforma.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10">
                            <input type="text" class="form-control custom-input" placeholder="Nombre(s)" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10">
                            <input type="text" class="form-control custom-input" placeholder="Apellido  paterno" name="last_name" id="lastname">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10">
                            <input type="text" class="form-control custom-input" placeholder="Apellido materno" name="last_name2" id="lastname2">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10">
                            <input type="email" class="form-control custom-input" placeholder="Correo electrónico o nombre de usuario" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-10 col-10">
                            <input type="date" class="form-control custom-input datepicker" data-date-format="mm/dd/yyyy" placeholder="Fecha de nacimiento" name="date_of_birth" id="date_of_birth">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-10 col-10 d-none d-sm-none d-md-none d-lg-block">
                            <input type="text" class="form-control custom-input" placeholder="Número celular" maxlength="10" name="phone" id="phone">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                    </div> -->
                    <div class="form-group row justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-10 col-10">
                            <input type="text" class="form-control custom-input" placeholder="País" name="country" id="country">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-10 col-10 mt-3 mt-md-0 d-sm-none d-md-none d-lg-block">
                            <input type="text" class="form-control custom-input" placeholder="Estado" name="state" id="state">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                    </div> -->
                    <div class="form-group row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10">
                            <input type="text" class="form-control custom-input" placeholder="Código Postal" name="zip_code" id="zip_code">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10">
                            <input type="password" class="form-control custom-input" placeholder="Contraseña" name="password" id="password">
                        </div>
                    </div>
                    <div class="form-check content-acept-terms">
                        <div class="">
                            <input type="checkbox" class="form-check-input" id="acept-terms">
                            <label class="form-check-label acept-terms" for="acept-terms">Acepto los <span>Terminos</span>, <span>Condiciones</span> y <span>Politicas de MOM</span></label>
                        </div>
                    </div><br>
                    <button class="btn btn-purple-df pull-left">Registrate</button>
                    <!-- <button class="btn btn-purple-df pull-right">Inicia sesión</button> -->
                </form>
                <div class="row py-4 d-flex align-items-center socials-medias">
                    <div class="col-12 text-center">
                      <a class="fb-ic">
                        <i class="fab fa-whatsapp mr-4"> </i>
                      </a>
                      <a class="ins-ic">
                        <i class="fab fa-instagram mr-4"> </i>
                      </a>
                      <a class="fb-ic">
                        <i class="fab fa-facebook-f mr-4"> </i>
                      </a>
                      <a class="tw-ic">
                        <i class="fab fa-twitter mr-4"> </i>
                      </a>
                    </div>           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
