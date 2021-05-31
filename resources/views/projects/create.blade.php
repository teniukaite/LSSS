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
                    <div class="card-header"> Paslaugos įtraukimas į projektą:</div>
                    <div class="card-body">
                        <form method="POST" action="/projects">
                            @method('POST')
                            @csrf
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
                            <p><b style="color:rgb(204, 51, 153);">PAVADINIMAS:</b> {{$offer->service_name}}</p>
                            <p><b style="color:rgb(204, 51, 153);">APRAŠYMAS:</b> {{ $offer->description }}</p>
                            <p><b style="color:rgb(204, 51, 153);">KAINA:</b> {{ $offer->price }} {{ $offer->price_content}}</p>
                            <p><b style="color:rgb(204, 51, 153);">TRUKMĖ:</b> {{ $offer->duration }} VAL.</p>
                            <p><b style="color:rgb(204, 51, 153);">MIESTAS:</b> {{ $offer->city }}</p>


                            <label  for="$time_id"><p><b style="color:rgb(204, 51, 153);">REGISTRACIJOS DATA:</b></p></label>
                            <select required="required" class="select-large select-light {{ $errors->has('time_id') ? 'is-invalid' : '' }}"  name="time_id">
                                <option class="select" style="font-size: 20px" value="time_id" >Pasirinkite laiką:</option>
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
                            <div class="form-group">
                                <input type="hidden" value="{{ $offer->id }}" name="id" />
                                <input type="hidden" value="{{ $offer->freelancerId }}" name="freelancerId" />
                                <input type="hidden" value="{{ $offer->price }}" name="price" />
                                <input type="hidden" value="{{ $offer->price_content }}" name="price_content" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="button button-primary button-large">Įtraukti</button>
                            </div>
                        </form>
                                <a class="button button-secondary button-large" href="{{ URL::previous() }}">Atgal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection
