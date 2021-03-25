<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LSSS</title>

    <style>
        p {text-align: center;}
        .bg-light {
            background-color: #a3297a;
            position: absolute;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;
        }
        .top-right {
            position: fixed;
            right: 10px;
            top: 18px;
        }

        .position-ref {
            position: relative;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 64px;
            position: fixed;
            top: 250px;
        }
        .links > a {
            color:  #ffffff;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        #footer-gradient {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            color: #ffffff;
            background-color: #a3297a;
            text-align: center;
        }

        #footer-gradient a{
            color: #ffe6ff;
        }
        .button{
            position:relative;
            z-index: 50;
            border: black;
        }
        body {
            background-image: url("https://www.wallpapertip.com/wmimgs/197-1975687_light-purple-gradient-gradient-background-light-color.jpg");
            background-repeat: no-repeat;
        }

    </style>
</head>
<body>
<section>
        <nav class="navbar navbar-expand-sm bg-light navbar-light" >
                    <div class="navbar-end">

                        @if (Route::has('login'))
                            <div class="top-right links">

                                @auth
                                    <a class="button is-info is-inverted is-outlined" href="{{ url('/home') }}">Pagrindinis</a>

                                @else
                                    <a align="right" class="btn btn-primary" href="{{ route('login') }}">Prisijungti</a>
                                    @if (Route::has('register'))
                                        <a class="button is-info is-inverted is-outlined" href="{{ route('register') }}"><span>Registruotis</span></a>
                                    @endif

                                @endauth
                            </div>
                        @endif
                    </div>
            </nav>
</section>

    <div class="flex-center position-ref full-height">
        <div class="content has-text-centered">
                <div class="title m-b-md">LSSS</div>
            <div class="links">
                <a href="{{ config('app.url')}}/offers">Peržiūrėkite paslaugos</a>
                <a href="{{ config('app.url')}}/createoffers">Įkelti paslaugą</a>
            </div>

        </div>
    </div>



</body>
        <footer class="footer" id="footer-gradient">
            <div class="container">
                <div class="content has-text-centered">
                    <img  src="https://gaijinpot.com/_nuxt/img/10ea598.png" align="left" width="5%" height="5%"/>
                    <p>
                        LSSS - Laisvai samdomų specialistų sistema - 2021.
                    </p>
                    <p>
                        <a href="mailto:karrad@ktu.edu">Karolina Radzevičiūtė</a>
                    </p>
                </div>
            </div>
        </footer>


