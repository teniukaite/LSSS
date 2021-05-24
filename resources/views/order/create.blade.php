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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Užsakymo sukūrimas:</div>
                <div class="card-body">
                    <form method="POST" action="/orders">
                        @method('POST')
                        @csrf
                        <p><b style="color:rgb(204, 51, 153);">PAVADINIMAS:</b> {{$offer->service_name}}</p>
                        <p><b style="color:rgb(204, 51, 153);">APRAŠYMAS:</b> {{ $offer->description }}</p>
                        <p><b style="color:rgb(204, 51, 153);">KAINA:</b> {{ $offer->price }} {{ $offer->price_content}}</p>
                        <p><b style="color:rgb(204, 51, 153);">TRUKMĖ:</b> {{ $offer->duration }} VAL.</p>
                        <p><b style="color:rgb(204, 51, 153);">MIESTAS:</b> {{ $offer->city }}</p>


                        <label  for="$order_date"><p><b style="color:rgb(204, 51, 153);">REGISTRACIJOS DATA:</b></p></label>
                        <select required="required" class="select-large select-light {{ $errors->has('order_date') ? 'is-invalid' : '' }}"  name="order_date">
                            <option class="select" style="font-size: 20px" value="order_date" >Pasirinkite laiką:</option>
                            @foreach(\App\Models\Schedule::All()->where('date','>',Carbon\Carbon::now()->format('Y-m-d'))->sortBy(function ($inquiry) {
                        return sprintf('%s%s', $inquiry->date, $inquiry->time);
                    })->values() as $time)

                                @if($time->offer_id==$offer->id)
                                    @if($time->status==0)
                                    <option  style="font-size: 18px; color:black" {{ old('date')==$time->id ? 'selected' : '' }} value="{{$time->id}}">{{$time->date}}__{{ substr($time->time, 0, 5)}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                        <p>Galite palikti komentarą, kurį matys laisvai samdomas specialistas.</p>
                        <p><b>Rekomenduojama palikti savo telefono numerį.</b></p>
                        <div class="form-input">
                            <label style="color:rgb(204, 51, 153);"><b>KOMENTARAI:</b></label><input  class="input" type="text" name="comment">
                        </div>

                        <div class="form-group">
                            <input type="hidden" value="{{ $offer->id }}" name="id" />
                        </div>
                        <div class="form-group uk-margin-top">
                            <button type="submit" class="button button-primary button-large">Užsakyti</button>
                            <a class="button button-secondary button-large" href="{{ URL::previous() }}">Atgal</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@endsection
