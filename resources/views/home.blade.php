@extends('layouts.app')
<style>
    .btn-link {
        color: rgb(204, 153, 255)!important;
    }
    .btn-link:hover {background-color:rgb(153, 51, 102);}


    </style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1><div class="card-header">Pradžia</div></h1>

                <div class="card-body thead-light">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <h4>Sveikiname prisijungus!</h4>

{{--                    @if(Auth::user()->is_admin)--}}

{{--                        <h3>--}}
{{--                         Peržiūrėkite <a class="btn-link" href="{{ url('admin/tickets') }}">užklausas</a>.--}}
{{--                            </h3>--}}
{{--                    @else @if(Auth::user()->is_admin)--}}

{{--                        <h3>--}}
{{--                         Peržiūrėkite <a class="btn-link" href="{{ url('admin/tickets') }}">užklausas</a>.--}}
{{--                            </h3>--}}
{{--                    @else--}}

                        <h5>
                             <a class="btn-link" href="{{ config('app.url')}}/offers">Peržiūrėkite  sistemoje teikiamas paslaugas </a>
{{--                            arba <a class="btn-link" href="{{ config('app.url')}}/createoffers">sukurkite naują</a>. <br>--}}
{{--                            Peržiūrėkite <a class="btn-link" href="{{ config('app.url')}}/offers">paslaugų pasiūlymus</a>.--}}
                        </h5>

{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

