@extends('layouts.app')
@section('css')
    <link href="{{ asset('public/css/cursos/cursos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row col-12 justify-content-center row-category-videos">
        <div class="h-100 align-items-center d-lg-inline-flex col-12">
            <div class="col-12 col-sm-12 text-center "> </br>   
                
                <h1 class="h1-title-curso-detail">Mi perfil</h1>
            </div>
        </div>
</div>

<div class="container mt-2">
    <div class="h-100 align-items-center d-lg-inline-flex col-12">
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center "> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Nombre(s)</label></br> 
            <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">MARINÉ IRUHARY</label>
        </div>
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center "> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Apellidos</label></br> 
            <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">Moreno Burgos</label>
        </div>
    </div>
    <div class="h-100 align-items-center d-lg-inline-flex col-12">
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center "> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Correo</label></br> 
            <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">iruhary@gmail.com</label>
        </div>
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center"> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Membresía</label></br> 
            <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">Anual</label>
        </div>
    </div>
    <div class="h-100 align-items-center d-lg-inline-flex col-12">
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center "> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Teléfono</label></br> 
            <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">(999)1-125-2298</label>
        </div>
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center"> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Vencimiento</label></br> 
            <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">15/05/2022</label>
        </div>
    </div>
    <div class="h-100 align-items-center d-lg-inline-flex col-12">
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center"> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Fecha de nacimiento</label></br> 
             <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">10/10/1996</label>
        </div>
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center "> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">País</label></br> 
            <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">México</label>
        </div>
    </div>
    <div class="h-100 align-items-center d-lg-inline-flex col-12">
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center"> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Código postal</label></br> 
             <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">97470</label>
        </div>
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center "> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Estado</label></br> 
            <label for="namePerfil" class="col-form-label text-md-right title-small label-perfil">Yucatán</label>
        </div>
    </div>
    <div class="h-100 align-items-center d-lg-inline-flex col-12">
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center"> </br>   
            
        </div>
        <div class="col-12 col-sm-12 col-lg-6 col-md-6 text-center "> </br>   
            <label for="namePerfil" class="col-form-label text-md-right title-small label-form">Contraseña</label></br> 
            <a class="btn" href="{{ url('/actualizar') }}"> Actualizar contraseña </a>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('public/js/cursos/cursos.js') }}"></script>
@endsection