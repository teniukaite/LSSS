@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Jūsų pasiūlymas</strong></div>
                    <div class="card-body">
                        <p><b>Pavadinimas:</b> {{ $offer->service_name }}</p>
                        <p><b>Aprašymas:</b> {{ $offer->description }}</p>
                        <p><b>Kaina:</b> {{ $offer->price }} eur.</p>
                        <p><b>Miestas:</b> {{ $offer->city }}</p>
                        @foreach($categories as $category)
                            @if ($category->id == $offer->category)
                                <p class="border"><b>Kategorija:</b> {{ $category->name}} </p>
                            @endif
                        @endforeach
                        <a href="/offers/{{ $offer->id }}/edit" class="btn btn-primary mb-2 btn-block text-white">Redaguoti</a>

                    </div>

                    </div>
                </div>
            </div>
        </div>
@endsection

