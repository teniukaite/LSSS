@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header"><h2>Paslaugų pasiūlymai, atitinkantys Jūsų paiešką</h2></div>

                <h4 style="color: rgb(96, 32, 64);margin-top: 30px"><b>RASKITE PASLAUGĄ PAGAL RAKTINĮ ŽODĮ:</b></h4>
                <div class="col-md-12" style=" margin-bottom: 30px; margin-top: 30px" >
                    <form  type="get" action="{{url('/search')}}">
                        <input  class="form-control" name="query" type="search"  style="margin-bottom: 5px; width: 550px!important;"  placeholder="Įveskite paslaugos, kurios ieškote raktinį žodį" aria-label="Įveskite paslaugos, kurios ieškote raktinį žodį">
                        <button class="btn btn-search text-white" style="height: 40px; width: 50px;" > <i class="material-icons" style="width: 10px; height: 10px">search </i></button>
                    </form>
                </div>
                <a href="/offers" class="btn btn-success mb-1 text-white">Atgal</a>
                    <div class="card-body">
                        @forelse($offers->chunk(3) as $offerChunk)
                            <div class="row hidden-md-up mb-1">
                                @foreach ($offerChunk as $offer)
                                    <div class="col-md-4">
                                        <div class="card m-1">
                                            <img height="100%" src="{{ Storage::url($offer->file_path) }}"
                                                 onerror="this.onerror=null; this.src='https://bulma.io/images/placeholders/1280x960.png'" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{$offer->service_name}}</b></h5>
                                                <p class="card-text">
                                                    Kaina: {{$offer->price}}<br>
                                                    Miestas: {{ ucfirst($offer->city)}}
                                            </div>
                                            <div class="card-footer text-center">
                                                <a href="/offers/{{ $offer->id }}" class="btn btn-success mb-1 btn-block text-white">Peržiūrėti</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
        @empty
            <div class="alert alert-danger">
             Šiuo metu neturime pasiūlymų, atitinkančių Jūsų paiešką  <i class="material-icons" style="width: 200px">priority_high</i>
            </div>
        @endforelse

    </div>

</div>
@endsection
@section('footer')
@endsection
