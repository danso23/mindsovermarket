@extends('layouts.app')

@section('content')
    <section class="cursos">
        <div class="container" id="divCurso">
            <div class="card mt-3" style="border-radius: 11px;">
                <div class="card-body">
                    <video poster="{{ asset('public/cursos') }}/{{$cursos[0]->portada}}" muted loop controls controlslist="nodownload">
                        <source src="{{ asset('public/cursos') }}/{{$cursos[0]->desc_curso}}" type="video/mp4">
                        <source src="{{ asset('public/cursos') }}/{{$cursos[0]->desc_curso}}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    <p class="card-text text-center">Desarrollo web</p>
                    
                </div>
            </div>
        </div>
    </section>

@endsection