@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Paslaugų pasiūlymai</div>

                    <form class="card-body">

                        <h3> Pasiūlymo redagavimas:</h3>

                        <form method="POST" action="/offers/{{ $offer->id }}">
{{--                            @method('PATCH')--}}
                            @csrf

                            <div class="form-group">
                                <label for="name" >Pavadinimas:</label>
                                <input type="text" name="service_name" class="form-control {{ $errors->has('service_name') ? 'is-invalid' : '' }}"  placeholder="Įveskite pavadinimą:" value="{{ $errors->any() ? old('service_name') : $offer->service_name }}" />
                            </div>
                            <div class="form-group">
                                <label  for="description">Aprašymas:</label>
                                <input type="text" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"  placeholder="Aprašykite savo pasiūlymą:" value="{{ $errors->any() ? old('description') : $offer->description }}" />
                            </div>
                            <div class="form-group">
                                <label  for="price">Kaina:</label>
                                <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"  placeholder="Įveskite kainą:" value="{{ $errors->any() ? old('price') : $offer->price }}" />
                            </div>
                            <div class="form-group">
                                <label for="city" >Miestas:</label>
                                <input type="text" name="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"  placeholder="Miestas, kuriame bus atliekama paslauga" value="{{ $errors->any() ? old('city') : $offer->city }}" />
                            </div>
                            <div class="form-group">
                                <label  for="category">Kategorija:</label>
                                <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" style="width: 100%" name="category">
                                    <option value="">Pasirinkite kategoriją</option>
                                    @foreach(App\Models\Categories::all() as $type)
                                        <option @if (!$errors->any()) {{ $offer->category==$type->id ? 'selected' : '' }} @else {{ old('category')==$type->id ? 'selected' : ''}} @endif value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="edit" class="btn btn-primary">Išsaugoti</button>
                                <a class="btn btn-primary" href="{{ URL::previous() }}">Atgal</a>
                            </div>

                         </form>

                        <form action="/offers/{{ $offer->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div>
                                <button class="btn btn-danger" type="submit">Pašalinti pasiūlymą</button>
                            </div>
                        </form>
                    </form>
            </div>
        </div>
    </div>
@endsection
