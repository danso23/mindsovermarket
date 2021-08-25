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
        <div class="row">
            <div class="container mt-4" id="divCurso">
                <div class="row justify-content-md-start justify-content-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4WHmvhQL6AU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container mt-4">
                <div class="row justify-content-md-start justify-content-center">
                        <label for="fechaInicial" class="col-md-4 col-form-label text-md-right title-small label-form">Filtro de fechas</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control custom-input" placeholder="Fecha inicial" name="fechaInicial" id="fechaInicial">
                                <input type="text" class="form-control custom-input" placeholder="Fecha final" name="fechaFinal" id="fechaFinal">
                            </div>
                </div>
            </div>
        </div>
        <div class="content-ebooks">
        <div class="container content-f1">
                <div class="row mrl-q">
                <div class="container h-100" > 
                    <div class="h-100 align-items-center d-lg-inline-flex col-12">
                            <div class="col-12 col-sm-6 text-left ">
                                <h1 style="color: #48448f !important; font-weight: bold;">Próximos cursos</h1>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection