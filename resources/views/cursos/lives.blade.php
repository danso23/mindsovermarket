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
                <a href="{{ url('cursos/lives') }}">LIVES</a>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center text-sm-center">
                <a href="{{ url('categorias/curso/4') }}">TIENDA</a>
            </div>
        </div>
    </div>
    <div class="row col-12 justify-content-center row-category-videos">
        <div class="h-100 align-items-center d-lg-inline-flex col-12">
            <div class="col-12 col-sm-12 text-left "> </br>   
                <div class="container" id="divCurso">
                    <div class="row justify-content-md-start justify-content-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/4WHmvhQL6AU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="container mt-4">
                <div class="row justify-content-md-start justify-content-center mt-3">
                    <div class="h-100 align-items-center d-lg-inline-flex col-12 justify-content-center">
                                <h1 style="color: #70b62c !important; font-weight: bold; ">Lista de próximos lives</h1></br>
                           
                    </div>
                </div></br>
                <div class="row justify-content-md-start justify-content-center mt-3">
                        <label for="fechaInicial" class="col-md-3 col-form-label text-md-right title-small label-form">Filtro de fechas</label></br>
                        <div class="col-md-4">
                                <input type="date" class="form-control custom-input datepicker" placeholder="Fecha inicial" name="fechaInicial" id="fechaInicial">
                        </div>
                        <div class="col-md-4">
                                <input type="date" class="form-control custom-input datepicker" placeholder="Fecha final" name="fechaFinal" id="fechaFinal">
                        </div>
                </div></br>
                <div class="row justify-content-md-start justify-content-center mt-4">
                <table class="table table-sm" style="color: #48448f !important;">
                    <thead>
                        <tr>
                        <th scope="col">Nombre del live</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha y Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lives as $live)
                            <tr>
                                <td>{{$live->nombre}}</td>
                                <td>{{$live->descripcion}}</td>
                                <td>{{$live->fecha_hora}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="content-ebooks">
        <!-- <div class="container content-f1">
                <div class="row mrl-q">
                <div class="container h-100" > 
                    <div class="h-100 align-items-center d-lg-inline-flex col-12">
                            <div class="col-12 col-sm-6 text-left ">
                                <h1 style="color: #48448f !important; font-weight: bold;">Próximos cursos</h1></br>
                            </div>
                        </div>
                    </div>
                    <div class="card ml-4" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary" style="background-color:#70b62c;">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card ml-4" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary" style="background-color:#70b62c;">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card ml-4" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary" style="background-color:#70b62c;">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container content-f1 mt-5">
                <div class="row mrl-q">
                <div class="container h-100">
                    <div class="align-items-center d-lg-inline-flex col-12">
                            <div class="col-12 col-sm-6 text-left ">
                                <h1 style="color: #70b62c; font-weight: bold;">¡CONOCE LOS </h1><h1 style="color: #48448f !important; font-weight: bold;">E-BOOKS</h1><h1 style="color: #70b62c; font-weight: bold;"> DE TRADING!</h1>
                                <p class="lead">Conoce el material extra que tenemos para ti...</p>
                            </div>
                            <div class="d-lg-inline col-sm-12 col-md-2 col-12 text-lg-left text-center">
                                <a href="{{ asset('public/doc_1.pdf') }}" download="Manual de Trading Avanzado"><img src="{{ asset('public/img/Libros/DF-book.jpg') }}" class="img-curses"></a>
                            </div>
                            <div class="d-lg-inline col-sm-12 col-md-2 col-12 text-lg-left text-center ">
                                <a href="{{ asset('public/doc_2.pdf') }}" download="Curso Intensivo Trading"><img src="{{ asset('public/img/Libros/DF-book002.jpg') }}" class="img-curses"></a>
                            </div>
                            <div class="d-lg-inline col-sm-12 col-md-2 col-12 text-lg-left text-center ">
                                <img src="{{ asset('public/img/Libros/DF-book003.jpg') }}" class="img-curses">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection