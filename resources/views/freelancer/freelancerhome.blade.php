@extends('layouts.app')
@section('nav-items')
    <style>
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
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pradžia</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Jūs prisijungėte!

                        @if(Auth::user()-> is_admin)

                            <p>
                                Peržiūrėkite <a href="{{ url('admin/tickets') }}">užklausas</a>.
                            </p>
                        @else

                            <p>
                                Peržiūrėkite savo <a>="{{ config('app.url')}}/offers">užsakytas paslaugas</a> arba <a href="{{ config('app.url')}}/createoffers">sukurkite naują</a>.<br>
                                Peržiūrėkite <a>href="{{ config('app.url')}}/offers">įklekite paslaugų pasiūlymus</a>.
                            </p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
