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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header title-header" style="color: #70b62c;">Temario</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cursos.form.saveTemarios') }}" id="frmTemario">
                        @csrf
                        <div class="form-group row">
                            <label for="nameTemario" class="col-md-4 col-form-label text-md-right title-small label-form">Nombre del temario</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input" placeholder="Nombre del temario" name="nameTemario" id="nameTemario">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="nameModulo" class="col-md-4 col-form-label text-md-right title-small label-form">Nombre del módulo</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input" placeholder="Nombre del módulo" name="nameModulo" id="nameModulo">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcionTema" class="col-md-4 col-form-label text-md-right title-small label-form">Descripción del tema</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control custom-input" placeholder="Descripción del tema" name="descripcionTema" id="descripcionTema">
                                </div>
                        </div>
                        <div class="form-group row">
                        <label for="video" class="col-md-4 col-form-label text-md-right title-small label-form">Video</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control custom-input" placeholder="Video" name="video" id="video">
                                </div>
                        </div>
                        <a class="btn btn-link" href="#" style="text-align:left;">
                                        <!-- Añadir más temas... -->
                                    </a></br></br>
                        <input class="btn btn-red-df pull-left" id="frmTemarioCancelar" value="Cancelar">
                        <input type="submit" class="btn btn-purple-df pull-left" id="frmTemarioGuardar" value="Guardar">
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