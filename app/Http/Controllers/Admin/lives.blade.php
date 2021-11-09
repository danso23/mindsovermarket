@extends('layouts.app')

@section('css')
    <style>
        


    </style>
    <link href="{{ asset('public/css/cursos/cursos.css') }}" rel="stylesheet" type="text/css" />
    <!--<link href='fullcalendar/main.css' rel='stylesheet' />-->
    <link href="{{asset('public/js/lib/main.css') }}" rel='stylesheet' />

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
                
            </div>
        </div>

        <div class="row">
            <div class="container mt-4">
                <div class="row justify-content-md-start justify-content-center mt-3">
                    <div class="h-100 align-items-center d-lg-inline-flex col-12 justify-content-center">
                                <h1 style="color: #70b62c !important; font-weight: bold; ">Lista de próximos lives</h1></br>
                           
                    </div>
                </div></br>
                <div id='calendar'></div>
                
                <!--<div class="row justify-content-md-start justify-content-center mt-4">
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
                </div>-->
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

@section('script')
    <script src="{{asset('public/js/lib/main.js')}}"></script>
    <script src="{{asset('public/js/lib/locales/es.js')}}"></script>
    

    <script>
    
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
                            headerToolbar: {
                                left: 'prevYear,prev,next,nextYear today',
                                center: 'title',
                                right: 'dayGridMonth,dayGridWeek,dayGridDay'
                            },
                            initialDate: '2021-11-01',
                            navLinks: true, // can click day/week names to navigate views
                            editable: true,      
                            contentHeight: 650,
                            dayMaxEvents: true, // allow "more" link when too many events
                            locale: 'es',
                            events: [{
                                title: 'Formación general para principiantes',
                                start: '2021-11-01'
                                },
                                {
                                  title: 'Broker y plataforma de trading',
                                  start: '2021-11-07',
                                  end: '2021-11-10'
                                },
                                {
                                  groupId: 999,
                                  title: 'Análisis técnico Básico',
                                  start: '2021-11-11T16:00:00'
                                },
                                {
                                  groupId: 999,
                                  title: 'Análisis Técnico Avanzado',
                                  start: '2021-11-16T16:00:00'
                                },
                                {
                                  title: 'Gestión de capital',
                                  start: '2021-11-11',
                                  end: '2021-11-13'
                                },
                                {
                                  title: 'Nuevo curso',
                                  start: '2021-11-12T10:30:00',
                                  end: '2021-11-12T12:30:00'
                                },
                                {
                                  title: 'Coffe Break',
                                  start: '2021-11-12T12:00:00'
                                },
                                {
                                  title: 'El principito',
                                  start: '2021-11-12T14:30:00'
                                },
                                {
                                  title: 'Formación avanzada',
                                  start: '2021-11-12T17:30:00'
                                },
                                {
                                  title: 'Dinero',
                                  start: '2021-11-12T20:00:00'
                                },
                                {
                                  title: 'Aniversario',
                                  start: '2021-11-13T07:00:00'
                                },
                                {
                                  title: 'Curso prueba Minds Over Market',
                                  url: 'http://mindsovermarket.com/',
                                  start: '2021-11-28'
                                }]
                            });
                            
                            calendar.render();
    });
    </script>
@endsection