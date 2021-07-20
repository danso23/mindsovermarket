@extends('layouts.app')

@section('css')
    <link href="{{ asset('public/css/cursos/cursos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <section class="cursos"></br>
    <div class="container" style="1px red solid; height:100px;">

    </div>
    <div class="content-banner">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-6 text-left">
                    <h1>APRENDE DE NASDAQ Y DOW JONES</h1>
                    <p class="lead">Impartido por: Isaac Peña</p>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="container" id="divCurso">
                <div class="row justify-content-md-between" style="justify-content: center; ">
                    @foreach ($cursos as $curso)
                    <div class="col-10 col-md-6 col-lg-3 col-sm-6">
                        <a href="{{ asset('/cursos/detail') }}/{{$curso->id_curso}}">
                            <div class="card mt-3 card-curso">
                                <img src="{{ asset('public/cursos') }}/{{$curso->portada}}" class="img-fluid img-curso" alt="{{ $curso->nombre }}">
                                <div class="card-body">
                                    <p class="card-text text-center cursos-title">{{ $curso->nombre }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content-ebooks" style="border: 1px red solid;">
        <div class="container content-f1">
                <div class="row mrl-q">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-sm-center content-footer-logo">
                        <a href=""><img src="{{ asset('public/img/Logotipo/DF-logotipopiedepagina.svg') }}" alt="index.php"></a>
                        <div class="row justify-content-start">
                            <div class="col-md-11 col-lg-11">
                                <p>Conoce el material extra que tenemos para ti...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-center text-sm-center text-md-left text-lg-left content-comunidad">
                    
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 text-center text.sm-center text-md-left text-lg-left content-cryptos">
                    
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-center text-sm-center text-md-left text-lg-left content-cursos-live">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection