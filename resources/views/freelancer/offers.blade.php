@extends('layouts.app')

    <style>
        /*div, span {*/
        /*    display: inline-list-item;*/
        /*}*/
        /*div {*/
        /*    float: left;*/
        /*}*/
        /*div {*/
        /*    clear: both;*/
        /*}*/
        /*.container{*/
        /*    display: inline-block;*/
        /*    grid-template-columns: 1fr 1fr 1fr 1fr ;*/
        /*    align-self: center;*/
        /*}*/
        /*p {*/
        /*    flex: 1;*/
        /*}*/
        /*ul {*/
        /*    list-style-type: none;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    overflow: hidden;*/
        /*    background-color: white;*/
        /*}*/
        p{color:black!important}
        p.inset {border-style: inset; border-color: rgb(102, 0, 102); background-color: black}
        p.border {border-style: inset; border-color: black}
        h1.inset {border-style: inset; border-color: rgb(102, 0, 102)}
        h2.inset {border-style: inset; border-color: rgb(102, 0, 102); background-color: black}
        .button1 {
            background-color: black;
            color: violet;
            border: 2px black;
        }

        .button:hover {
            background-color: violet; /* Green */
            color: black;
        }


    </style>

@section('content')
    <a class="button button1 align-self-lg-center" type="submit" href="/freelancer/createoffers">Įkelti naują pasiūlymą</a>
<h2 align="center" class="inset"><b>Paslaugų pasiūlymai</b></h2>
    <h2  class="inset" align="center"><b>Čia pateiktos visos jūsų teikiamos paslaugos</b></h2>


{{--        <div class="column" style="background-color:#aab;">--}}


                    @foreach($allOffers as $offers)
                        <ul>
                            <div class="container">
                            <p style="color: white" class="inset">{{ $offers->service_name }}</p>
                            <p class="border"><b>Aprašymas:</b> {{ $offers->description }}</p>
                            <p class="border"><b>Kaina:</b> {{ $offers->price }} eur.</p>
                            <p class="border"><b>Miestas:</b> {{ $offers->city }} </p>
                                @foreach($categories as $category)
                                @if ($category->id == $offers->category)
                                    <p class="border"><b>Kategorija:</b> {{ $category->name}} </p>
                                @endif
                                @endforeach

                            <p class="border"><b>Registracijos laikas:</b> {{ $offers->registration_times }}</p>
                             <a href="/offers/{{ $offers->id }}" class="button mb-1 btn-block text-white">Peržiūrėti</a>
                            </div>
                        </ul>



                    @endforeach




{{--        </div>--}}

@endsection
