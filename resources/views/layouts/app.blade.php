<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Minds Over Market') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link href="{{ asset('public/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="{{ asset('public/js/all.js') }}" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="{{ asset('public/css/font-family.css') }}" rel="stylesheet" /><!-- Merriweather-->
    <link href="{{ asset('public/css/font-family2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="{{ asset('public/css/magnific-popup.min.css') }}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('/public/css/style.css') }}" rel="stylesheet" />
    <!-- AOS ANIMATION -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/animation_aos/aos.css') }}">
    @yield('css')
</head>
<body>
    <div id="app">
        <div class="@if (Request::is('/')) info-nav @else info-nav custom-nav @endif d-xl-block d-lg-none d-md-none d-sm-none d-none">
            <div class="container">
                <div class="d-flex row bd-highlight">
                    <div class="p-2 bd-highlight col-3">
                        <a href="{{ asset('/')}}" class="logo">
                            <img src="{{ asset('public/img/Logotipo/DF-logotipoheader.svg') }}" class="logo-black" alt="">
                            <!-- <img src="img/logo.png" class="logo-white" alt=""> -->
                        </a>
                    </div>
                    <div class="p-2 bd-highlight col-6 align-self-end" style="display: flex;">
                        <ul class="menu-center">
                            <li>
                                <form action="" class="form-inline">
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                                        </span>
                                        <input class="form-control py-2 border-right-0 border" type="search" id="example-search-input">
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="d-highlight align-self-lg-end p-2 col-3" style="display: flex;">
                        <ul class="menu-right">
                            @auth
                                @if (auth()->user()->tipo_user == 3)
                                <li class="menu-m align-bottom">
                                    <button class="navbar-toggler toggler-example toggle-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="text-white">
                                            <i class="fas fa-bars"></i>
                                        </span>
                                    </button>
                                </li>
                                @endif
                            @endauth
                            <li>
                                @if (Auth::guest())
                                    <a class="btn" href="{{ url('/login') }}"> Iniciar sesión </a>
                                @else
                                    <span class="user-perfil" data-toggle="popover" tabindex="0" data-trigger="focus" data-content="<a href='{{ url('Perfil/MostrarPerfil') }}' class='btn'>Mi perfil</a>
                                    <br>
                                    <a href='{{ url('cursos/view') }}' class='btn'>Mis cursos</a>
                                    @if (auth()->user()->tipo_user == 3)
                                        <br>
                                        <a href='{{ route('Catalogo.Temario') }}' class='btn'>Catalogo Temario</a>
                                        <a href='{{ route('Catalogo.Curso') }}' class='btn'>Catalogo Curso</a>
                                        <a href='{{ route('Catalogo.Material') }}' class='btn'>Catalogo Material</a>
                                    @endif
                                    <br>
                                    <a class='btn' href='{{ url('/logout') }}'> Cerrar sesión </a>
                                    " data-placement="bottom" data-html="true">{{auth()->user()->name}} 
                                        <i class="fas fa-user"></i>
                                    </span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="@if (Request::is('/')) info-nav @else info-nav custom-nav @endif d-block d-md-block d-lg-block d-xl-none">
            <div class="container">
                <div class="d-flex row bd-highlight justify-content-center text-center">
                    <div class="col-lg-3 col-md-3 col-sm-2 col-3 p-2 bd-highlight">
                        <a href="{{ asset('/')}}" class="logo">
                            <img src="{{ asset('public/img/Logotipo/DF-logotipoheader.svg') }}" class="logo-black" alt="">
                            <!-- <img src="img/logo.png" class="logo-white" alt=""> -->
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-6 p-2 bd-highlight align-self-end">
                        <ul class="menu-center">
                            <li>
                                <form action="" class="">
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                                        </span>
                                        <input class="form-control py-2 border-right-0 border" type="search" id="example-search-input">
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-5 col-3 p-sm-2 p-3 bd-highlight menu-login align-self-md-end align-self-center">
                        <ul class="menu-right mb-0 mb-sm-3 d-flex">
                            @auth
                                @if (auth()->user()->tipo_user == 3)
                                <li class="menu-m align-bottom">
                                    <button class="navbar-toggler toggler-example toggle-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="text-white">
                                            <i class="fas fa-bars"></i>
                                        </span>
                                    </button>
                                </li>
                                @endif
                            @endauth
                            <li class="align-self-center">
                                @if (Auth::guest())
                                    <a class="btn d-none d-sm-block" href="{{ url('/login') }}"> Iniciar sesión </a>
                                    <span class="user-perfil d-block d-sm-none" data-toggle="popover" tabindex="0" data-trigger="focus" data-content="
                                    <a href='{{ url('/login') }}' class='btn'>Iniciar sesión</a>
                                    <br>
                                    " data-placement="bottom" data-html="true">
                                        <i class="fas fa-user fa-lg"></i>
                                    </span>
                                @else
                                    <span class="user-perfil" data-toggle="popover" tabindex="0" data-trigger="focus" data-content="<a href='{{ url('Perfil/MostrarPerfil') }}' class='btn'>Mi perfil</a>
                                    <br>
                                    <a href='{{ url('cursos/view') }}' class='btn'>Mis cursos</a>
                                    @if (auth()->user()->tipo_user == 3)
                                        <br>
                                        <a href='{{ route('Catalogo.Temario') }}' class='btn'>Catalogo Temario</a>
                                        <a href='{{ route('Catalogo.Curso') }}' class='btn'>Catalogo Curso</a>
                                        <a href='{{ route('Catalogo.Material') }}' class='btn'>Catalogo Material</a>
                                    @endif
                                    <br>
                                    <a class='btn' href='{{ url('/logout') }}'> Cerrar sesión </a>" data-placement="bottom" data-html="true"><span class="d-none d-sm-block d-md-inline">{{auth()->user()->name}}</span>
                                        <i class="fas fa-user"> </i>
                                    </span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER -->
        @include('layouts.template_navbar_responsive')
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header p-0">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text icon-search" id="basic-addon1"><i class="fas fa-search fa-rotate-90"></i></span>
                            </div>
                            <input type="text" class="form-control form-search" placeholder="" aria-label="Username" aria-describedby="basic-addon1" id="txtSearch">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main data-aos="fade-in">
            @yield('content')
        </main>
        <!--footer-->
        <footer class="site-footer">
            <div class="container content-f1">
                <div class="row mrl-q">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-sm-center content-footer-logo">
                        <a href=""><img src="{{ asset('public/img/Logotipo/DF-logotipopiedepagina.svg') }}" alt="index.php"></a>
                        <div class="row justify-content-start">
                            <div class="col-md-11 col-lg-11">
                                <p>Academia de trading fundada en el 2018 con un único propósito formar traders profesionales.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-center text-sm-center text-md-left text-lg-left content-comunidad">
                    <h6>COMUNIDAD</h6>
                        <ul>
                            <li>
                                <a href="#">Entradas</a>
                            </li>
                            <li>
                                <a href="#">Cryptos</a>
                            </li>
                            <li>
                                <a href="#">Futuros masding</a>
                            </li>
                            <li>
                                <a href="#">Telegram</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 text-center text.sm-center text-md-left text-lg-left content-cryptos">
                    <h6>CRYPTOS</h6>
                        <ul>
                            <li>
                                <a href="#">Entradas</a>
                            </li>
                            <li>
                                <a href="#">Básico</a>
                            </li>
                            <li>
                                <a href="#">Intermedio</a>
                            </li>
                            <li>
                                <a href="#">Avanzado</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 text-center text-sm-center text-md-left text-lg-left content-cursos-live">
                        <h6>CURSOS EN VIVO</h6>
                        <ul>
                            <li>
                                <a href="#">Calendario</a>
                            </li>
                            <li>
                                <a href="#">Lives</a>
                            </li>
                            <li>
                                <a href="#">Próximo evento</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row py-4 d-flex align-items-center socials-medias">
                  <div class="col-md-6 col-lg-4 text-center text-md-left">
                    <a class="fb-ic" href="https://wa.link/zz6hxq">
                      <i class="fab fa-whatsapp mr-4"> </i>
                    </a>
                    <a class="ins-ic" href="https://www.instagram.com/mindsovermarket/?hl=es">
                      <i class="fab fa-instagram mr-4"> </i>
                    </a>
                    <a class="fb-ic" href="https://www.facebook.com/MindsOverMarket">
                      <i class="fab fa-facebook-f mr-4"> </i>
                    </a>
        
                  </div>
                  <div class="col-md-6 col-lg-8 text-center text-md-left mb-4 mb-md-0">
                      <h6 class="mb-0">Copyright © MINDS OVER MARKET | <a href="">Politicas De Privacidad</a> | <a href="">Términos Y Condiciones</a></h6>
                  </div>            
                </div>
            </div>
        </footer>
        <!--end footer-->
        <!-- Bootstrap core JS-->
        <script src="{{ asset('public/js/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Third party plugin JS-->
        <script src="{{ asset('public/js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('public/js/jquery.magnific-popup.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('public/js/main.js') }}"></script>
        <script src="{{ asset('public/js/wow.min.js') }}"></script>
        <!-- Core theme JS-->
        <!-- <script src="{{ asset('/js/scripts.js') }}"></script> -->
        <!-- AOS ANIMATION -->
        <script type="text/javascript" src="{{ asset('public/animation_aos/aos.js') }}"></script>
        <!-- INIT AOS -->
        <script type="text/javascript" src="{{ asset('public/js/animation.js') }}"></script>
        @yield('script')
    </div>
    </section> 
</body>
</html>
