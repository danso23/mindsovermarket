@extends('layouts.app')

@section('css')
    <link href="{{ asset('public/css/cursos/cursos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <section class="cursos">
    <div class="row col-12 justify-content-center row-category-videos">
        <div class="row col-8">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center text-sm-center">
                <a href="{{ url('categorias/curso/1') }}">TRADING</a>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-2 text-center text.sm-center">
                <a href="{{ url('categorias/curso/2') }}">CRYPTOS</a>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center text-sm-center">
                <a href="{{ url('categorias/curso/3') }}">LIVES</a>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center text-sm-center">
                <a href="{{ url('categorias/curso/4') }}">TIENDA</a>
            </div>
        </div>
    </div>
    <div class="content-banner">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-6 text-left">
                    <h1>APRENDE DE NASDAQ Y DOW JONES</h1>
                    <p class="lead">Impartido por: Isaac Peña</p>
                </div>
            </div>}
        </div>
    </div>
        <div class="row">
            <div class="container mt-4" id="divCurso">
                <div class="row justify-content-md-start justify-content-center">
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
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4WHmvhQL6AU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="content-ebooks">
        <div class="container content-f1">
                <div class="row mrl-q">
                <div class="container h-100">
                    <div class="h-100 align-items-center d-lg-inline-flex col-12">
                            <div class="col-12 col-sm-6 text-left ">
                                <h1 style="color: #70b62c; font-weight: bold;">¡CONOCE LOS </h1><h1 style="color: #48448f !important; font-weight: bold;">E-BOOKS</h1><h1 style="color: #70b62c; font-weight: bold;"> DE TRADING!</h1>
                                <p class="lead">Conoce el material extra que tenemos para ti...</p>
                            </div>
                            <div class="d-lg-inline col-sm-12 col-md-2 col-12 text-lg-left text-center">
                                <img src="{{ asset('public/img/Libros/DF-book.jpg') }}" class="img-curses">
                            </div>
                            <div class="d-lg-inline col-sm-12 col-md-2 col-12 text-lg-left text-center ">
                                <img src="{{ asset('public/img/Libros/DF-book002.jpg') }}" class="img-curses">
                            </div>
                            <div class="d-lg-inline col-sm-12 col-md-2 col-12 text-lg-left text-center ">
                                <img src="{{ asset('public/img/Libros/DF-book003.jpg') }}" class="img-curses">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection