@extends('layouts.app')

@section('style')
<style>

</style>
@endsection

@section('script')
<script>
    $( document ).ready(function() {
        $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Paslaugų pasiūlymai</strong></div>
         @foreach($allOffers as $offers)
                <div class="card-body">
                <p><b>Pavadinimas:</b> {{ $offers->service_name }}</p>
                <p><b>Aprašymas:</b> {{ $offers->description }}</p>
                <p><b>Kaina:</b> {{ $offers->price }} eur.</p>
                <p><b>Registracijo laikai:</b> {{ $offers->registration_times }}</p>
             @endforeach
                @if(Auth::check() && Auth::user()->is_admin)
                <a href="/offers/{{ $offers->id }}/edit" class="btn btn-primary mb-1 text-white">Redaguoti</a>
                <a class="btn btn-danger mb-1 text-white">Šalinti</a>
                @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection











{{--
<!doctype html>

<head>
    <title> Paslaugos</title>
    <!--styling etc. -->
</head>
<body>
<div class="flex-center position-ref full-heigt">
    <div class="content">

            <h1>Paslaugų sąrašas!</h1>
        <table>
            <thead>
                <td>Pavadinimas</td>
                <td>Aprašymas</td>
                <td>Kaina</td>
                <td>Registracijos laikai</td>
            </thead>
            <tbody>
            @foreach($allOffers as $offers)
                <tr>
                    <td>{{$offers->service_name}}</td>
                    <td class="inner-table">{{$offers->description}} </td>
                    <td class="inner-table">{{$offers->price}} </td>
                    <td class="inner-table">{{$offers->registration_times}} </td>
                </tr>
                @endforeach

            <div class="card mt-3">
                <div class="card-header">
                    <b>"Google maps" žemėlapiai</b>
                </div>
                <div class="card-body">
                    <iframe
                    id="map"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyACqKoYL5g7whw38JhM_1AYGY6tVpmVRvI&q={{$offers->city}}" allowfullscreen>
                    </iframe>
                </div>
            </div>

            </tbody>
        </table>
    </div>
</div>
</body>
--}}
