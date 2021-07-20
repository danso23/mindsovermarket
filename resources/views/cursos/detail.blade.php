@extends('layouts.app')

@section('content')
<link href="{{ asset('public/css/cursos.css') }}" rel="stylesheet" type="text/css" />
    <section class="cursos">
        <div class="row">
            <div class="container" id="divCurso">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                            <div class="card mt-3 card-curso">
                                <video id="videoPrincipal" poster="" preload="auto" muted loop controls controlslist="nodownload">
                                    Your browser does not support the video tag.
                                </video>
                                <p class="ml-2 mt-2 title-video" id="name_temario"></p>
                            </div></br>

                            {{-- <div class="card mt-3 card-curso">
                                <p class="card-text text-center">{{$datos['materiales'][0]->nombre}}</p>
                            </div></br> --}}
                            @foreach ($datos['modulos'] as $mod)
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="heading{{ $mod->id_modulo}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link btn-collapse" data-toggle="collapse" data-target="#collapse{{$mod->id_modulo}}" aria-expanded="true" aria-controls="collapse{{$mod->id_modulo}}">
                                        {{$mod->nombre}}
                                        </button>
                                    </h5>
                                    </div>
                                    <div id="collapse{{ $mod->id_modulo }}" class="collapse show" aria-labelledby="heading{{ $mod->id_modulo}}" data-parent="#accordion">
                                    <div class="card-body">
                                        @foreach ($mod['temario'][0] as $temario)
                                            <a href="#" onclick="showVideo(this)" class="a-temario" data-url-temario="{{ asset('public/cursos') }}/{{ $temario->url_video }}" data-temario="{{ $temario->nombre }}"><h4>{{$temario->nombre}}</h4></a>
                                            <h7> {{$temario->descripcion}} </h7>
                                        @endforeach
                                    </div>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('public/js/cursos/cursos.js') }}"></script>
@endsection