@extends('layouts.app')

@section('content')
<link href="{{ asset('public/css/cursos.css') }}" rel="stylesheet" type="text/css" />
    <section class="cursos">
        <div class="row">
            <div class="container" id="divCurso">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                            <div class="card mt-3 card-curso">
                                <video>
                                <p class="card-text text-center">{{$datos['temario'][0]->nombre}}</p>
                                <source src="{{ asset('public/cursos') }}/{{$datos['temario'][0]->url_video}}" type="video/mp4">
                                <source src="{{ asset('public/cursos') }}/{{$datos['temario'][0]->url_video}}" type="video/ogg">
                                
                                </video>
                            </div></br>

                            <div class="card mt-3 card-curso">
                                <p class="card-text text-center">{{$datos['materiales'][0]->nombre}}</p>
                            </div></br>

                            @foreach ($datos['modulos'] as $fila)
                            <div id="accordion">
                            
                                <div class="card">
                                    <div class="card-header" id="heading{{$fila->id_modulo}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$fila->id_temario}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$fila->nombre}}
                                        </button>
                                    </h5>
                                    </div>
                                    @foreach ($datos['temario'] as $lista)
                                    <div id="collapse{{$fila->id_temario}}" class="collapse show" aria-labelledby="heading{{$fila->id_modulo}}" data-parent="#accordion">
                                    <div class="card-body">
                                    <h4>{{$lista->nombre}}</h4>
                                    <h7>{{$lista->descripcion}}</h7>
                                    </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection