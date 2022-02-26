<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LSSS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <Link href = "{{asset ('css/app.css')}}" rel = "stylesheet">

@yield('script')

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-light shadow p-3 mb-5 bg-dark ">

        <div class="container" >
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'LSSS') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/comparison">{{ __('Lyginamos paslaugos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/projects">{{ __('Projektai') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" style="color: rgb(153, 51, 102)" href="/home">{{ __('Mano paskyra') }}</a>
                        </li>

                        {{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="/home">{{ __('Mano paskyra') }}</a>--}}
{{--                        </li>--}}
                    @endauth
                </ul>
{{--                @if(Auth::check() && Auth::user()->type==0)--}}
{{--                    <a class="dropdown-item" href="/freelancer/question">--}}
{{--                        {{ __('Teikti savo paslaugas') }}--}}
{{--                    </a>--}}
{{--                @endif--}}
                <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/offers">{{ __('Paslaugos') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/freelancer/freelancerslist">{{ __('Specialistai') }}</a>
                    </li>
                    <!-- Authentication Links -->
                    @yield('nav-items')
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registruotis') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="/profile">
                                    {{ __('Mano profilis') }}
                                </a>
                                <a class="dropdown-item" href="/comparison">
                                    {{ __('Lyginamos paslaugos') }}
                                </a>
                                <a class="dropdown-item" href="/projects">
                                    {{ __('Projektai') }}
                                </a>
                                @if(Auth::check() && Auth::user()->type==1)
                                    <a class="dropdown-item" href="/orders">
                                        {{ __('Mano užsakymai') }}
                                    </a>
                                @endif
                                @if(Auth::check() && Auth::user()->type==1)
                                    <a class="dropdown-item" href="/freelancer/offers">
                                        {{ __('Mano teikiamos paslaugos paslaugos') }}
                                    </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Atsijungti') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-3" style="align-content: center;justify-content: center">
        @yield('content')
    </main>



</div>

@yield('footer')

<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>PERŽIŪRĖKITE</h3>
                    <ul>
                        <li><a href="/offers">PASLAUGAS</a></li>
                        <li><a href="#">SPECIALISTUS</a></li>
                        <li><a href="#">PROJEKTUS</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-5 item">
                    <h3>SUSISIEKITE <i class="material-icons" style="width: 200px">mail </i></h3>
                    <ul>
                        <li><a href="mailto:karrad@ktu.edu">KAROLINA RADZEVIČIŪTĖ</a></li>
                    </ul>
                </div>
                <div class="col-md-4 item text">
                    <h3>LAISVAI SAMDOMŲ SPECIALISTŲ SISTEMA</h3>
                    <p>Čia galite įkelti savo teikiamas paslaugas ir tapti laisvai samdomų specialistų bendruomenės dalimi!</p>
                </div>
            </div>
            <p class="copyright">LSSS © 2021</p>
        </div>
    </footer>
</div>
</body>
</html>
