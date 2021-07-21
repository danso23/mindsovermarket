@extends('layouts.app')
@section('css')
    <link href="{{ asset('public/css/cursos/cursos.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <section class="cursos">
    <div class="row col-12 justify-content-center" style="background-color: #f1f1f1; margin-left:0px;">
        <div class="row col-8">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center text-sm-center">
                <a href="#">TRADING</a>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-2 text-center text.sm-center">
                <a href="#">CRYPTOS</a>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center text-sm-center">
                <a href="#">LIVES</a>
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 text-center text-sm-center">
                <a href="#">TIENDA</a>
            </div>
        </div>
    </div>
    <div class="row col-12 justify-content-center" style="background-color: #D3D3D3; margin-left:0px;">
    <div class="h-100 align-items-center d-lg-inline-flex col-12">
                            <div class="col-12 col-sm-6 text-left "> </br>   
                                <a href=""><img style="height:60px;" src="{{ asset('public/img/Iconos/crecimiento.svg') }}" alt="index.php"></a>
                                <h1 style="color: #48448f !important; font-weight: bold;">APRENDE DE NASDAQ Y DOW JONES</h1>
                                <p class="lead">Impartido por Isaac Peña</p>
                            </div>
                            <div class="d-lg-inline col-sm-12 col-md-6 col-12 text-lg-left text-center">
                            <div class="card mt-3 card-curso">
                                <video id="videoPrincipal" poster="" preload="auto" muted loop controls controlslist="nodownload">
                                    Your browser does not support the video tag.
                                </video>
                                <p class="ml-2 mt-2 title-video" id="name_temario"></p>
                            </div></br>
                            </div>
                        </div>
    </div>
    <div class="h-100 align-items-center d-lg-inline-flex col-12 mt-4">
            <div class="col-12 col-sm-6 text-left " style="background-color: #F1F1F1; border-radius: 8px; margin: 15px; padding: 20px;">   
                <div id="accordion">
                            @foreach ($datos['modulos'] as $mod)
                            <div class="card">
                                <div class="card-header" id="heading{{ $mod->id_modulo}}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link btn-collapse" data-toggle="collapse" data-target="#collapse{{$mod->id_modulo}}" aria-expanded="true" aria-controls="collapse{{$mod->id_modulo}}" style="color: #484490; font-family: inherit; font-weight: bold">
                                    {{$mod->nombre}}
                                    </button>
                                </h5>
                                </div>
                                <div id="collapse{{ $mod->id_modulo }}" class="collapse show" aria-labelledby="heading{{ $mod->id_modulo}}" data-parent="#accordion">
                                    <div class="card-body">
                                        @foreach ($mod['temario'][0] as $temario)
                                            <a href="#" onclick="showVideo(this)" class="a-temario" data-url-temario="{{ asset('public/cursos') }}/{{ $temario->url_video }}" data-temario="{{ $temario->nombre }}"><h4>- {{$temario->nombre}}</h4></a>
                                            <p> {{$temario->descripcion}} </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
            </div>
            <div class="d-lg-inline col-sm-12 col-md-6 col-12 text-lg-left text-center">
            </div>
        </div>
    </div>
    <div class="h-100 align-items-center d-lg-inline-flex col-12 mt-4">
            <div class="col-12 col-sm-6 text-left " style="background-color: #F1F1F1; border-radius: 8px; margin: 15px; padding: 20px;">   
                <p style="color: #484490; font-family: inherit; font-weight: bold">¿QUÉ APRENDERÁS DE ESTE CURSO?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente eligendi magni ducimus tempora numquam adipisci autem fugiat, quidem, consequuntur libero velit voluptatem officia. Placeat fugit molestiae nesciunt ex beatae suscipit?</p>
            </div>
            <div class="d-lg-inline col-sm-12 col-md-6 col-12 text-lg-left text-center">
            </div>
        </div>
    </div>
    <div class="h-100 align-items-center d-lg-inline-flex col-12 mt-4">
            <div class="col-12 col-sm-6 text-left " style="background-color: #F1F1F1; border-radius: 8px; margin: 15px; padding: 20px;">   
                <p style="color: #484490; font-family: inherit; font-weight: bold">SOBRE EL PROFESOR</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente eligendi magni ducimus tempora numquam adipisci autem fugiat, quidem, consequuntur libero velit voluptatem officia. Placeat fugit molestiae nesciunt ex beatae suscipit?</p>
            </div>
            <div class="d-lg-inline col-sm-12 col-md-6 col-12 text-lg-left text-center">
            </div>
        </div>
    </div>
    <div class="h-100 align-items-center d-lg-inline-flex col-12 mt-4">
            <div class="col-12 col-sm-6 text-left " style="background-color: #F1F1F1; border-radius: 8px; margin: 15px; padding: 20px;">   
                <p style="color: #484490; font-family: inherit; font-weight: bold">DESCARGA AQUÍ EL MATERIAL</p>
                <p>{{$datos['materiales'][0]->nombre}}</p>
                <a class="btn btn-green-df"  href="{{ asset('public/cursos/documento-prueba.pdf') }}" download="Reporte2Mayo2010"> Descargar </a>
            </div>
            <div class="d-lg-inline col-sm-12 col-md-6 col-12 text-lg-left text-center">
            </div>
        </div>
    </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('public/js/cursos/cursos.js') }}"></script>
@endsection