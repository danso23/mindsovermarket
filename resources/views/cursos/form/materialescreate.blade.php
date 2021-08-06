@extends('layouts.app')
@section('css')
    <link href="{{ asset('public/css/cursos/cursos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container mt-5">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 align-self-center text-center">
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
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header title-header" style="color: #70b62c;">Materiales</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cursos.form.saveMateriales') }}" id="frmMateriales">
                        @csrf
                        <div class="form-group row">
                            <label for="nameMaterial" class="col-md-4 col-form-label text-md-right title-small label-form">Nombre del material</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control custom-input" placeholder="Nombre del curso" name="nameMaterial" id="nameMaterial">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="materialFile" class="col-md-4 col-form-label text-md-right title-small label-form">Material</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control custom-input" placeholder="Materiales" name="materialFile" id="materialFile" onchange="uploadFile(this)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slcCurso" class="col-md-4 col-form-label text-md-right title-small label-form">Seleccionar curso</label>
                            <div class="col-md-6">
                                <select name="slcCurso" id="slcCurso" class="form-control custom-input"></select>
                            </div>
                        </div>
                        <input class="btn btn-red-df pull-left" id="frmMaterialCancelar" value="Cancelar">
                        <input type="submit" class="btn btn-purple-df pull-left" id="frmMaterialGuardar" value="Guardar">
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
    <script type="text/javascript" src="{{ asset('public/js/cursos/form.js') }}"></script>
    <script>
        var url_global = "{{ url('') }}";
    </script>
@endsection