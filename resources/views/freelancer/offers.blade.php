@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="button button-primary" style="height: 50px; width: 400px; margin-bottom: 20px" type="submit" href="/files/index">Mano darbų pazydžiai</a>
                <a class="button button-secondary" style="height: 50px; width: 400px;margin-bottom: 20px" type="submit" href="/freelancer/createoffers">Įkelti naują pasiūlymą</a>
                <div class="card">
                    <div class="card-header"><h2>Jūsų teikiamos paslaugos</h2></div>
                    <div class="card">
                    <div class="card-body">
                        @forelse($allOffers->chunk(2) as $offerChunk)
                            <div class="row hidden-md-up mb-1" >
                                @foreach ($offerChunk as $offers)
                            <div class="col-md-6">
                                <div class="card m-1"style="height: 500px">
                                    <div class="card-body">
                                        <h3 class="card-header" style="width: 460px"><b>{{$offers->service_name}}</b></h3>
                                        <p class="card-text">
                            <span> {{ $offers->price }} {{ $offers->price_content }}</span>
                                            <span> {{ $offers->city }}</span>
                                        <p >{{ $offers->description }}</p>

                                        <div>{{ $offers->registration_times }}</div>
                                        @foreach($categories as $category)
                                            @if ($category->id == $offers->category)
                                                <h4><b>Kategorija:</b> {{ $category->name}} </h4>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="/offers/{{ $offers->id }}/edit" style="width: 280px; height: 40px; margin-left: auto;margin-right: auto" class="button button-primary button-large">Redaguoti</a>
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
        </div>
    </div>
</div>
@endsection
@section('footer')
@endsection
