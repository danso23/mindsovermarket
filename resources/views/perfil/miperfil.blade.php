@extends('layouts.app')
@section('css')
    <link href="{{ asset('public/css/cursos/cursos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row col-12 justify-content-center row-category-videos">
        <div class="h-100 align-items-center d-lg-inline-flex col-12">
            <div class="col-12 col-sm-12 text-center "> </br>   
                <a href=""><img style="height:60px;" src="{{ asset('public/img/Iconos/perfil.png') }}" alt="index.php"></a>
                <h1 class="h1-title-curso-detail">Mi perfil</h1>
            </div>
        </div>
</div>

<div class="container mt-5">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 align-self-center text-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cursos.form.saveMateriales') }}" id="frmMateriales">
                        @csrf
                        <div class="form-group row">
                            <label for="nameMaterial" class="col-md-4 col-form-label text-md-right title-small label-form">Nombre(s):</label>
                            <label for="nameMaterial" class="col-md-3 col-form-label text-md-right title-small label-form">Iruhary</label>
                        </div>
                        <div class="form-group row">
                            <label for="nameMaterial" class="col-md-4 col-form-label text-md-right title-small label-form">Apellidos:</label>
                            <label for="nameMaterial" class="col-md-3 col-form-label text-md-right title-small label-form">Moreno Burgos</label>
                        </div>
                        <div class="form-group row">
                            <label for="nameMaterial" class="col-md-4 col-form-label text-md-right title-small label-form">Correo:</label>
                            <label for="nameMaterial" class="col-md-3 col-form-label text-md-right title-small label-form">iruhary@gmail.com</label>
                        </div>
                        <div class="form-group row">
                            <label for="nameMaterial" class="col-md-4 col-form-label text-md-right title-small label-form">Suscripción:</label>
                            <label for="nameMaterial" class="col-md-3 col-form-label text-md-right title-small label-form">Mensual.</label>
                        </div>
                        <div class="form-group row">
                            <label for="nameMaterial" class="col-md-4 col-form-label text-md-right title-small label-form">Fecha de vencimiento:</label>
                            <label for="nameMaterial" class="col-md-3 col-form-label text-md-right title-small label-form">15/07/2021.</label>
                        </div>
                        <div class="form-group row">
                            <label for="nameMaterial" class="col-md-4 col-form-label text-md-right title-small label-form">Si no tienes una membresía solicitala aquí:</label>
                            
                        </div>
                        <input class="btn btn-red-df pull-left" id="frmMaterialCancelar" value="Membresías">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('public/js/cursos/cursos.js') }}"></script>
@endsection