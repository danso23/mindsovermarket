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
            <h1>Materiales</h1>
                <form method="POST" action="{{ route('cursos.form.save') }}" id="frmMateriales">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-12 form-group">
                            <input type="text" class="form-control custom-input" placeholder="Nombre del curso" name="name" id="name">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 form-group">
                            <input type="file" class="form-control custom-input" placeholder="Materiales" name="material" id="material">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-red-df pull-left" id="frmMaterialCancelar" value="Cancelar">
                    <input type="submit" class="btn btn-green-df pull-left" id="frmMaterialGuardar" value="Guardar">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/additional-methods.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/form.js') }}"></script>
@endsection