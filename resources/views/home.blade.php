@extends('layouts.app')

@section('style')
    <style>
        .card-img-top {
            width: 100%;
            height: 30vh;
            object-fit: cover;
        }

    </style>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card">

                    </div>
                    <br>



                    <div class="card-body">
                        <div class="uk-container uk-width-1-1 uk-margin-bottom uk-form-horizontal uk-nav-center"  data-uk-height-viewport="offset-top: false">
                        <div class="uk-container uk-container-large uk-margin-top uk-width-1-1 ">
                            @if(Auth::check() && Auth::user()->type==1)
                                <a class="button button-primary button-large" style="margin-bottom: 10px" href="/freelancer/offers">Mano <br>teikiamos <br>paslaugos<br><img style="width: 150px" src="img/Services.png"></a>&emsp;&emsp;
                                <a class="button button-primary button-large" style="margin-bottom: 10px"  href="/schedule/index">Tvarkaraštis <br><img style="width: 190px" src="img/Schedule.png"></a>&emsp;&emsp;
                                <a class="button button-primary button-large" style="margin-bottom: 10px"  href="/files/index">Mano<br> darbų<br> pavyzdžiai<br> <img style="width: 190px" src="img/workexamples.png"></a>&emsp;&emsp;
                                <a class="button button-primary button-large" style="margin-bottom: 10px" href="/freelancerorders">Gauti <br>užsakymai<br><img style="width: 190px" src="img/orders2.png"></a>&emsp;
                            @endif
                        </div>
                    </div>
            </div>


        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('footer')
@endsection
