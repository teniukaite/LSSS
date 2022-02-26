<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="{{ asset('js/uikit.js') }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="home">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
                <a hef="/admin"><img src="/img/lsss_admin.png" alt="" class="hidden-xs hidden-sm">
                    <img src="/img/lsss_admin.png" alt="" class="visible-xs visible-sm circle-logo">
                </a>
            </div>
            <div class="navi">
                <ul>
                    <li><a href="/admin"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Pagrindinis</span></a></li>
                    <li><a href="/admin/categories"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Kategorijos</span></a></li>
                    <li><a href="/admin/statistics"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Satistika</span></a></li>
                    <li><a href="/admin/users"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Naudotojai</span></a></li>
                    <li><a href="/admin/conflicts"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Konfliktai</span></a></li>
{{--                    <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Užklausos</span></a></li>--}}
{{--                    <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Atsiliepimai</span></a></li>--}}
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <div class="row">
                <header>
                    <div class="col-md-7">
                        <nav class="navbar-default pull-left">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-5">
                        <div class="header-rightside">
                            <ul class="list-inline header-top pull-right">
                                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/profile">Mano profilis</a>
                                        <div class="dropdown-divider"></div>
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

                            </ul>
                        </div>
                    </div>
                </header>
            </div>
            <div class="user-dashboard">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

</div>
<footer class="mainfooter" role="contentinfo">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4></h4>
                        <ul class="list-unstyled">
{{--                            <li><a href="#"></a></li>--}}
{{--                            <li><a href="#">Payment Center</a></li>--}}
{{--                            <li><a href="#">Contact Directory</a></li>--}}
{{--                            <li><a href="#">Forms</a></li>--}}
{{--                            <li><a href="#">News and Updates</a></li>--}}
{{--                            <li><a href="#">FAQs</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4></h4>
                        <ul class="list-unstyled">
{{--                            <li><a href="#">Website Tutorial</a></li>--}}
{{--                            <li><a href="#">Accessibility</a></li>--}}
{{--                            <li><a href="#">Disclaimer</a></li>--}}
{{--                            <li><a href="#">Privacy Policy</a></li>--}}
{{--                            <li><a href="#">FAQs</a></li>--}}
{{--                            <li><a href="#">Webmaster</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!--Column1-->
                    <div class="footer-pad">
                        <h4></h4>
                        <ul class="list-unstyled">
{{--                            <li><a href="#">Parks and Recreation</a></li>--}}
{{--                            <li><a href="#">Public Works</a></li>--}}
{{--                            <li><a href="#">Police Department</a></li>--}}
{{--                            <li><a href="#">Fire</a></li>--}}
{{--                            <li><a href="#">Mayor and City Council</a></li>--}}
{{--                            <li>--}}
{{--                                <a href="#"></a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Pasekite mus</h4>
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy">
                    <p class="text-center">&copy; Copyright 2021 - LSSS.  Visos teisės saugomos.</p>
                </div>
            </div>


        </div>
    </div>
</footer>
<script>
    $(document).ready(function(){
        $('[data-toggle="offcanvas"]').click(function(){
            $("#navigation").toggleClass("hidden-xs");
        });
    });
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
</script>
</body>
</html>
