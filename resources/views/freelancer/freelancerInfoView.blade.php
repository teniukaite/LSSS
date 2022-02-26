@extends('layouts.app')
@section('style')
    <style>
        .half {
            white-space:nowrap;
        }
        .half img {
            display:inline;
        }
        .half figcaption {
            display:block
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session('danger'))
                        <div class="alert alert-danger">
                            {{session('danger')}}
                        </div>
                    @endif
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    <div class="card-header"><strong>{{ $freelancer->name }} {{ $freelancer->surname }} </strong></div>
                    <div class="card-body">
                        <img name="photo" class="border-circle" style="width: 200px; border-radius: 20%; margin-bottom: 20px" alt="{{ $freelancer->name }}" src="{{ $freelancer->photo }}"readonly/>
                        <h4><b style="text-transform: uppercase;">Gimimo metai: </b> {{ $freelancer->year_of_birth }}</h4>
                        <h4><b style="text-transform: uppercase;">El.paštas:</b>{{ $freelancer->email }}</h4>
                        <h4><b style="text-transform: uppercase;">Telefono numeris: </b>{{ $freelancer->phoneNumber }}</h4>
                        <h4><b style="text-transform: uppercase;">Lytis: </b>{{ $freelancer->gender }}</h4>
                        @foreach($allCompetencies as $competencies)
                            @if($competencies->freelancerID==$freelancer->id)
                                <h4><b style="text-transform: uppercase;">Išsilavinimas:</b> {{ $competencies->education}} </h4>
                                <h4 style="width: 500px; margin-right: auto; margin-left: auto"><b style="text-transform: uppercase;">Aprašymas:</b> {{ $competencies->description}} </h4>
                                @if ($rating>0)
                                 <h4><b style="text-transform: uppercase;">Įvertinimas:</b> {{substr($rating,0,4)}}⭐/10⭐</h4>
                                @endif
                            @endif
                        @endforeach
                        <h2 style="text-transform: uppercase; margin-top: 30px;"><b>Visos teikiamos paslaugos</b></h2>
                        <table class="table table-striped center" style="margin-bottom: 20px; margin-top: 5px; width: auto;">
                            @foreach($offers as $offer)
                            @endforeach
                        @foreach($offers as $offer)
                            @if($offer->freelancerId==$freelancer->id)
                                <tr>
                                <th>{{$offer->service_name}}</th>
                                <th>   <a href="/offers/{{ $offer->id }}" class="button button-primary ">Peržiūrėti</a></th>
                                </tr>
                            @endif
                        @endforeach
                        </table>
                        <a href="/freelancer/freelancerslist" class="button button-secondary button-large">Atgal</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection
