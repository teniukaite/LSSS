@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Atsiliepimo palikimas</div>
                    <div class="card-body">
                        <form method="POST" action="/review">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                            <input type="hidden" name="freelancer_id" value="{{ $offer->freelancerId }}">
                            <div class="form-group">
                                <label for="review" >Komentaras:</label>
                                <textarea type="textarea" name="review" placeholder="Kokia Jūsų nuomonė apie atliktą paslaugą?" class="form-control {{ $errors->has('review') ? 'is-invalid' : '' }}"  placeholder="Įveskite atsiliepimą:" value="{{ old('review') }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating" >Įvertinimas:</label>
                                <select class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}" style="width: 50%" name="rating">
                                    <option selected value="">Pasirinkite įvertinimą</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option {{ old('rating')==$i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-primary">Pateikti atsiliepimą</button>
                                <a class="button button-secondary" href="{{ URL::previous() }}">Atgal</a>
                            </div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                @endforeach
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
