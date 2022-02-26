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
                    <div class="card-header"><strong>Pasiūlymo redagavimas:</strong></div>
                    <div class="card-body ">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="POST" action="/offers/{{ $offer->id }}">
                                @csrf
                                @method('PATCH')

                            <label for="name" class="form-label"style="width: 200px;margin-right: 0px;text-transform: uppercase">Pavadinimas:  </label>

                                <input type="text" name="service_name"  style="width: 500px"  class="uk-textarea uk-input {{ $errors->has('service_name') ? 'is-invalid' : '' }}"
                                       placeholder="Įveskite pavadinimą:"
                                       value="{{ $errors->any() ? old('service_name') : $offer->service_name }}" />
                                <hr>
                            <label for="description" class="form-label" style="width: 200px;text-transform: uppercase">Aprašymas:</label>
                                <textarea id="description" type="text"  rows="4" cols="50" name="description"
                                          value="{{ $errors->any() ? old('description') : $offer->description }}"
                                          class="uk-input{{ $errors->has('description') ? 'is-invalid' : '' }}"
                                          placeholder="Aprašykite savo pasiūlymą:" required>{{ $offer->description}}</textarea><br>
                                <hr>
                            <label for="price" class="form-label"style="width: 200px;text-transform: uppercase">Kaina:</label>
                                <input type="number" name="price"  style="width: 500px" class="uk-input{{ $errors->has('price') ? 'is-invalid' : '' }}"
                                       placeholder="Įveskite kainą:" value="{{ $errors->any() ? old('price') : $offer->price }}" />
                                <hr>
                                <label for="price_content" class="form-label" style="width: 200px;text-transform: uppercase">Kaina už:</label>
                                <select class="select-large select-light{{ $errors->has('price_content') ? 'is-invalid' : '' }}"
                                        value="{{ $errors->any() ? old('price_content') : $offer->price_content }}"
                                        style="width: 500px" name="category">
                                    <option>EUR/VAL</option>
                                    <option>UŽ ATLIKTĄ DARBĄ</option>
                                </select>
                                <hr>
                            <label for="city" class="label" style="width: 200px;text-transform: uppercase">Miestas:</label>
                                <input type="text" name="city"  style="width: 500px"  class="uk-input {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                       placeholder="Miestas, kuriame bus atliekama paslauga" value="{{ $errors->any() ? old('city') : $offer->city }}" />
                                <hr>
                                <label for="category" class="form-label" style="width: 200px; text-transform: uppercase">Kategorija:</label>
                                <select class="select-large select-light  {{ $errors->has('category') ? 'is-invalid' : '' }}" style="width: 500px" name="category">
                                    <option class="select" style="font-size: 20px" value="" >Pasirinkite kategoriją</option>
                                    @foreach(App\Models\Categories::all() as $type)
                                        <option @if (!$errors->any()) {{ $offer->category==$type->id ? 'selected' : '' }} @else {{ old('category')==$type->id ? 'selected' : ''}} @endif value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group" style="margin-top: 20px">
                                    <button type="submit" class="button button-primary button-large" style="text-transform: uppercase">Išsaugoti</button>
                                    <a class="button button-secondary button-large" style="text-transform: uppercase" href="{{ URL::previous() }}">Atgal</a>
                                </div>
                            </form>
                        <hr style="color: rgb(204, 51, 153); border-bottom: 3px solid rgb(204, 51, 153)">

                        <div class="container-small container-expand-right align-right ">
                                <form action="/offers/{{ $offer->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div>
                                        <button class="button button-danger button-large" style="text-transform: uppercase" type="submit">Pašalinti pasiūlymą</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
@endsection
@section('footer')
@endsection


