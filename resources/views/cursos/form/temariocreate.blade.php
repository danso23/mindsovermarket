@extends('layouts.app')
@section('css')
    <link href="{{ asset('public/css/cursos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container content-register">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 content-register-right align-self-center text-center">
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header title-header" style="color: #70b62c;">Módulos-Temario</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cursos.form.save') }}" id="frmCursos">
                        @csrf
                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right title-small">Nombre del curso</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input" placeholder="Nombre del curso" name="name" id="name">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right title-small">Nombre del módulo</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input" placeholder="Nombre del módulo" name="name" id="name">
                                </div>
                        </div></br>
                        <div class="form-group row">
                            <label for="tema" class="col-md-4 col-form-label text-md-right title-small">Nombre del tema</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input" placeholder="Nombre del tema" name="tema" id="tema">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="desctema" class="col-md-4 col-form-label text-md-right title-small">Descripción del tema</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input" placeholder="Descripción del tema" name="desctema" id="desctema">
                                </div>
                        </div>
                        <div class="form-group row">
                        <label for="video" class="col-md-4 col-form-label text-md-right title-small">Video</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control custom-input" placeholder="Video" name="video" id="video">
                                </div>
                        </div>
                        <a class="btn btn-link" href="#" style="text-align:left;">
                                        Añadir más temas...
                                    </a></br></br>
                        <input type="submit" class="btn btn-red-df pull-left" id="frmMaterialCancelar" value="Cancelar">
                        <input type="submit" class="btn btn-green-df pull-left" id="frmMaterialGuardar" value="Guardar">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/additional-methods.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/form.js') }}"></script>
@endsection