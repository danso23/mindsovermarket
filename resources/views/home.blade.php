@extends('layouts.app')

@section('content')
    <!--start content-->
    <section class="hero">
        <div class="content-banner">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                  <div class="col-6 text-left">
                    <h1>TODO LO QUE NECESITAS PARA SER UN TRADER EN UN SOLO LUGAR</h1>
                    <p class="lead">Conoce nuestras membresias y unete a nuestra plataforma.</p>
                    @if (Auth::guest())
                        <a class="btn btn-green-df" href="{{ route('register') }}" >Registrate</a>
                    @else
                        <a class="btn btn-green-df" href="{{ route('cursos.view') }}" >Acceder</a>
                    @endif
                  </div>
                </div>
            </div>
        </div>
        <div class="content-why-chooose container-home">
            <div class="h-100">
                <div class="row justify-content-center h-100">
                    <div class="col xl-5 col-lg-5 col-md-3 col-sm-9">
                        <h2>¿POR QUÉ ELEGIRNOS A <span>NOSOTROS</span>?</h2>
                        <p>Nos enfocamos en formar traders profesionales; contamos con las herramientas específicas para tu crecimiento; la eficiencia de tu aprendizaje es nuestra prioridad; reducimos la curva de aprendizaje un 50%.</p>
                    </div>
                    <div class="col-xl-1 col-lg-1 d-lg-block d-md-none"></div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-9 col-col-2 content-why-choose-img">
                        <img src="{{ asset('public/img/Iconos/ayuda.svg') }}" class="img-why-choose">
                        <p>Hemos contribuido en el desarrollo de traders financiados, gestores de cuentas y fondos de inversión profesionales.</p>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-9 col-col-2 content-why-choose-img">
                        <img src="{{ asset('public/img/Iconos/equipo.svg') }}" class="img-why-choose">
                        <p>Somos traders y educadores profesionales en mercados de futuros, CFD, cryptos y tecnología blockchain.</p>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-9 col-col-2 content-why-choose-img">
                        <img src="{{ asset('public/img/Iconos/crecimiento.svg') }}" class="img-why-choose">
                        <p>Relación costo beneficio, vas a conseguir información de calidad con un costo menor al del mercado. Toda la información en un mismo lugar, sin costos adicionales y sesiones en vivo toda la semana.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-what-is container-home">
            <div class="h-100">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-10 col-10">
                        <img src="{{ asset('public/img/Imagenes/DF-porque.jpg') }}" alt="">
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-7 -col-sm-9 col-12 content-text-what-is">
                        <h2>¿QUÉ ES MINDS <span>O</span>VER MARKET?</h2>
                        <p>Somos una escuela de trading e inversiones fundada en el 2018</p>
                        <p> contamos con educadores profesionales para guiarte en el desarrollo de tu carrera como trader, nuestros servicios están estratégicamente planeados para brindarte educación y experiencia que te llevarán hacia la consistencia a largo plazo.</p>
                        <p>Nuestro propósito es formar mentes profesionales del trading.</p>
                    </div>
                </div>
            </div>
        </div>
        @guest
        <div class="content-membership">
            <div class="container-home h-100">
            <div class="row">
                    @if(isset($datos['productos']))
                        @foreach ($datos['productos'] as $producto)
                            <div class="col-12 col-lg-4">
                                <div class="card card-membership card-top" style="width: 18rem;">
                                    <div class="card-header header-green">
                                        <div class="row">
                                            <div class="col-12 text-center type-description-membership">
                                                <h6>{{ $producto->nombre_producto }}</h6>
                                            </div>
                                            <div class="col-12 text-center price-description-membership">
                                                <h3 class="price-membership"><span>USD </span>{{ $producto->precio }}</h3>
                                                <p>{{ $producto->desc_producto}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body list-contain-membership justify-content-center">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center list-contain">
                                                {!! $producto->listado_puntos !!}
                                                <!-- <ul class="list-inline">
                                                    <li>Trading en Vivo</li>
                                                    <li>Trading Academy</li>
                                                    <li>WeProfit</li>
                                                    <li>Criptoanálisis</li>
                                                    <li>Podcast (Markets)</li>
                                                    <li>Mindset</li>
                                                    <li>Grupos de Telegram</li>
                                                </ul> -->
                                            </div>
                                            <div class="col-12 text-center">
                                                <p class="fuente">Inscripción 10 usd pago único</p>
                                            </div>
                                            <!--<div class="col-12 d-flex justify-content-center">
                                                <a href="{{url('productos')}}" class="btn">Conoce más</a>
                                            </div>-->
                                            <div class="col-12 d-flex justify-content-center">
                                                <form action="{{ route('cart.add') }}" method="post">
                                                    @csrf                                                
                                                    <button type="submit" class="btn btn-primary btn-add-sp">Conoce más</button>
                                                    <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
        @endguest
        <div class="content-comments-members container-home">
            <div class="h-100">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-7 col-md-6 col-sm-10 col-10 comment-title">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-8 col-md-10 col-sm-5 col-5">
                                <h2>¡NUESTROS MIEMBROS <span>O</span>PINAN!</h2>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-4 col-sm-5 col-5">
                                <img src="{{ asset('public/img/Imagenes/DF-cliente1.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 d-none- d-sm-none d-md-none d-lg-block d-xl-block"></div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10 col-10 comments-members">
                        <div class="carousel slide" data-ride="carousel">
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                                <li data-target="#demo" data-slide-to="3"></li>
                            </ul>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <h6>Manuel Abadía</h6>
                                    <ul class="list-inline star-rating">
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p>Minds Over Market, Me Ayudo Muchísimo, A Lograr Entender, Como Los Mercados Bursátiles Funcionan, Cuando Inicie Tenia Ideas Erróneas Sobre El Mercado, Pero En Mi Proceso En Minds, Con Esfuerzo, Tiempo Y Mentoría De Isaac, He Logrado Encontrar, Mi Propia Manera De Hacer Trading.</p>
                                </div>
                                <div class="carousel-item">
                                    <h6>Daniel Peña</h6>
                                    <ul class="list-inline star-rating">
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p>Estoy Agradecido Por Que Siempre Estas Para Apoyarnos, Dedicas Mucho Tiempo A Nosotros Y Eso Es Algo Bueno, Tienes Demasiados Conocimientos Para Brindarnos Y Nos Motivas Día A Día</p>
                                </div>
                                <div class="carousel-item">
                                    <h6>Josue Alvarez</h6>
                                    <ul class="list-inline star-rating">
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p>Estoy Agradecido Por Que Siempre Estas Para Apoyarnos, Dedicas Mucho Tiempo A Nosotros Y Eso Es Algo Bueno, Tienes Demasiados Conocimientos Para Brindarnos Y Nos Motivas Día A Día</p>
                                </div>
                                <div class="carousel-item">
                                    <h6>Rudy Alvarado</h6>
                                    <ul class="list-inline star-rating">
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p>Máster Quiero Agradecerte El Gran Apoyo Que Das A La Comunidad De MINDS OVER MARKET, Que Para Mi Es Una Gran Familia Que Poco A Poco Crece, No Veo Otra Comunidad Como La FAMILIA MINDS Que Se Empeñan En Enseñar Sin Trucos, Y Mucho Menos Falsas Promesas, Porque De Eso Hay Mucho. Estar En MINDS OVER MARKET Es La Mejor Decisión Que Puede Tomar Cualquiera Que Desee Estar En El Mundo Del Trading.</p>
                                </div>
                                <div class="carousel-item">
                                    <h6>Serch Jacobo</h6>
                                    <ul class="list-inline star-rating">
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p>Aprender En Cualquier Lado, Vivir El Trading Solo En Minds Over Markets, Mas Que Recomendado.</p>
                                </div>
                            </div>
                            {{-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection