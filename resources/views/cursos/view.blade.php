@extends('layouts.app')

@section('content')
    <link href="{{ asset('public/css/cursos.css') }}" rel="stylesheet" type="text/css" />
    <section class="cursos"></br>
    <div class="title-header" style="color: #70b62c; text-align: center;">Cursos</div>
        <div class="row">
            <div class="container" id="divCurso">
                <div class="row">
                    @foreach ($cursos as $curso)
                    <div class="col-12 col-md-6 col-lg-3">
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
    </section>
@endsection