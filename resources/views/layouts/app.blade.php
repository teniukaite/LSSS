
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LSSS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <style>
          ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
              /*background-color: rgba(224, 141, 172,0.1);*/


          }

          li a {
              display: block;
              color: white;
              padding: 8px 16px;
              text-decoration: none;
          }
          li a:hover {
              /*background-color: rgba(135, 0, 88, 0.3);*/
              color: white;
          }

          body{
              font-family:Verdana,sans-serif;
              font-size:15px;
              line-height:1.5}

          /*h1{font-size:36px; color:rgb(128, 0, 64);}*/
          /*h2{font-size:30px; }*/
          /*h3{font-size:24px;color: #e0e0eb;}*/
          /*h4{font-size:20px; color: black;}*/
          /*h5{font-size:18px;}*/
          /*h6{font-size:16px;}*/
          /*h7{font-size:14px;color: black;}*/
          h1{font-size:36px; color: rgb(102, 0, 102)}
          h2{font-size:30px;color: white}
          h3{font-size:30px;color: rgb(168, 138, 166);}
          h4{font-size:20px; color: rgb(102, 0, 102); font-family: cursive; letter-spacing: 3px;  text-transform: uppercase;}
          h5{font-size:22px;color: white}
          h6{font-size:16px;color: white}
          body{
              font-family:Verdana,sans-serif;
              font-size:15px;
              line-height:1.5;
              background-color: rgb(233, 226, 233);
              /*margin-left: 160px; !* Same as the width of the sidenav *!*/
          }

          /*a:link {*/
          /*    color: rgb(204, 102, 153);*/
          /*}*/
          a:link {
              color:#FFE0FF;
          }

          /*container {*/
          /*    position: relative;*/
          /*    hover: span;*/
          /*}*/
          container{position:relative; hover: span;}
          .padding-top{padding:4px 10px!important}
          .padding-16{padding-top:16px!important;padding-bottom:16px!important}

          .themeblack {color:#fff !important;
              background-color:rgb(168, 138, 166)!important;
              border-radius: 5%;
          }
          .theme-light {color:white !important;
              background-color:rgb(168, 138, 166) !important;
              border-radius: 5%;}
          /*.padding-top{padding:4px 10px!important}*/
          /*.padding-16{padding-top:16px!important;padding-bottom:16px!important}*/

          /*.themeblack {color:white !important; background-color: rgb(128, 0, 64) !important;}*/
          /*.theme-light {color:#000 !important; background-color:#f0f0f0 !important}*/
          /*.center{text-align:center!important}*/
          /*.topnav {*/
          /*    overflow: hidden;*/
          /*    background-color: #000000;*/
          /*    text-align: right;*/
          /*}*/
          /*.button {*/
          /*    border: none;*/
          /*    padding: 5px 40px;*/
          /*    text-align: center;*/
          /*    text-decoration: none;*/
          /*    display: inline;*/
          /*    font-size: 18px;*/
          /*    margin: 0px 0px;*/
          /*    cursor: pointer;*/
          /*}*/
          .center{text-align:center!important}
          .topnav {
              overflow: hidden;
              text-align: right;
          }
          .button {
              background-color: rgb(102, 0, 51);
              border-radius:50%;
              color: white;
              padding: 5px 40px;
              text-align: center;
              text-decoration: none;
              display: inline;
              font-size: 22px;
              margin: 0px 0px;
              cursor: pointer;
          }


          margin-top{margin-top:16px!important;
              align-content: center}
          /**violetinis konteineris po juodo headerio**/
          .card{
              box-shadow:0 2px 5px 0 black,0 2px 50px 0 black;
              background-color:rgb(168, 138, 166);
              border-radius: 5%}
          /*margin-top{margin-top:16px!important}*/
          /*!**baltas konteineris po juodo headerio**!*/
          /*.card{box-shadow:0 2px 5px 0 rgb(204, 102, 153),0 2px 10px 0 rgba(0,0,0,0.12)}*/
          /*!** vietų parinkimas jame*/
          /*.half{width:49.99999%}*/
          /*row-padding>half*/
          /*.third{width:33.33333%}*/
          /*row-padding>third*/
          /*.twothird{width:66.66666%}*/
          /*row-padding>twothird*/
          /***!*/
          /*.margin-bottom{margin-bottom:16px!important}*/
          /*.text-theme {color:#000000 !important}*/
          /*!**footerio**!*/
          /*padding-16{padding-top:16px!important;padding-bottom:16px!important}.*/
          /*                                                                    .container{position:relative;}*/
          /*padding-14{*/
          /*padding-top: 14px;*/
          /*padding-right: 0px;*/
          /*padding-bottom: 14px;*/
          /*padding-left: 0px;*/
          /*}*/
          /*p {*/
          /*    font-family: Georgia, serif;*/
          /*    font-size: 24px;*/
          /*    color:#35393c;*/
          /*    border-color: rgb(102, 0, 51);*/
          /*}*/
          a {
              font-family: Georgia, serif;
              font-size: 24px;
              color:#35393c;
              border-color: rgb(102, 0, 102));
          }

          /*.footer {*/

          /*    text-align: center;*/
          /*    position: relative;*/
          /*    bottom: 0;*/
          /*    width: 100%;*/
          /*    clear: both;*/
          /*    overflow: auto;*/
          /*}*/
          .navbar {
              background-color: rgb(102, 0, 102);
              border-bottom: 3px black;
              border-top: 6px black;}
          .margin-bottom{margin-bottom:16px!important; align-content: center}
          .text-theme {color:#000000 !important}
          /**footerio**/
          padding-16{padding-top:16px!important;padding-bottom:16px!important}
          .container{position:relative;}
          p {
              font-family: verdana;
              font-size: 18px;
              color: white;
          }

      </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md padding-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
{{--                    {{ config('app.name', 'LSSS') }}--}}
                    <img src="/img/lsd.png" alt="Submit" style="width: 50%;">

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="button" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="button" href="{{ route('register') }}">{{ __('Registruotis') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        {{ __('Mano profilis') }}
                                    </a>
                                    <a class="dropdown-item" href="/orders">
                                        {{ __('Mano užsakymai') }}
                                    </a>

                                    @if(Auth::check() && Auth::user()->type==0)
                                    <a class="dropdown-item" href="/freelancer/question">
                                        {{ __('Teikti savo paslaugas') }}
                                    </a>
                                    @endif
                                    @if(Auth::check() && Auth::user()->type==1)
                                        <a class="dropdown-item" href="/freelancer/offers">
                                            {{ __('Mano teikiamos paslaugos') }}
                                        </a>
                                    @endif



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Atsijungti') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
{{--    <!-- Footer -->--}}
{{--    <footer class="footer">--}}
{{--        <h4>   LSSS - Laisvai samdomų specialistų sistema - 2021.</h4>--}}
{{--        <h3><a href="mailto:karrad@ktu.edu">Karolina Radzevičiūtė</a></h3>--}}
{{--    </footer>--}}
</body>
</html>
