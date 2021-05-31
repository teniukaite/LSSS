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
                    <div class="card-header"><strong>{{ $offer->service_name }} </strong></div>
                    <div class="card-body">
                        @foreach($categories as $category)
                            @if ($category->id == $offer->category)
                                <p class="border"><b style="color:rgb(204, 51, 153);">Kategorija:</b> {{ $category->name}} </p>
                            @endif
                         @endforeach
                                        <div class="card-body ">

                                            <h3 style="margin-bottom: 0px; font-size: 20px!important; font-weight: bold;"><b style="color:rgb(204, 51, 153);">APRAŠYMAS:</b></h3>
                                                <p>{{ $offer->description }}</p>
                                            <p style="margin-bottom: 0px; font-size: 20px!important; font-weight: bold;"><b style="color:rgb(204, 51, 153);">KAINA:</b>
                                           {{ $offer->price }}  {{ $offer->price_content }} </p>
                                            <p style="margin-bottom: 0px; font-size: 20px!important; font-weight: bold;"><b style="color:rgb(204, 51, 153);">TRUKMĖ:</b>
                                                {{ $offer->duration}} VAL.</p>
                                            <p style="margin-bottom: 0px; font-size: 20px!important; font-weight: bold;"><b style="color:rgb(204, 51, 153);">MIESTAS:</b>
                                            {{ $offer->city }}</p>

                                            @foreach( $users as $user)
                                                @if ($user->id == $offer->freelancerId)
                                                    <p style="margin-bottom: 0px; font-size: 20px!important; font-weight: bold;"><b style="color:rgb(204, 51, 153);">SPECIALISTAS: </b>{{ $user->name}} {{ $user->surname}}</p>
                                                    <p style="margin-bottom: 0px; font-size: 20px!important; font-weight: bold;"><b style="color:rgb(204, 51, 153);">TEL. NR.: </b>{{ $user->phoneNumber}} </p>
                                                    <p style="margin-bottom: 0px; font-size: 20px!important; font-weight: bold;"><b style="color:rgb(204, 51, 153);">EL. PAŠTAS: </b> {{ $user->email}}</p>
                                                @endif
                                            @endforeach

                                            @if ($count>0)
                                            <table class="table table-striped center" style="margin-bottom: 20px; margin-top: 30px; width: auto;">
                                                <th style="color: #602040">REGISTRACIJAI GALIMI LAIKAI</th>
                                                @foreach($times as $time)
                                                    @if($time->offer_id == $offer->id && $time->status==0)
                                                        <tr>
                                                            <td style="text-align: center; ">{{ $time->date}} {{ substr($time->time, 0, 5)}} </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                            @endif

                                            @if ($count<=0)
                                                <table class="table table-striped center" style="margin-bottom: 20px; margin-top: 30px; width: auto;">
                                                <th style="color: #602040">REGISTRACIJAI GALIMŲ LAIKŲ NĖRA</th>
                                                </table>
                                            @endif
                                        </div>
                                        <p style="color: rgb(204, 51, 153);">DARBŲ PAVYZDŽIAI</p>
                                            <div class="uk-child-width-1-4">
                                                @foreach($allFiles as $files)
                                                    @if ($files->freelancerID == $offer->freelancerId)
                                                        <img  class="half"  style="width:500px; height: auto; margin-bottom: 10px; margin-right: 10px"  src="{{ Storage::url( $files->file_path) }}">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                        @if ($count>0)

                            @if (Route::has('login'))
                                @auth
                                    @if(Auth::check() && Auth::user()->id != $offer->freelancerId )
                                    <a href="/order/{{ $offer->id }}/create" class="button button-primary button-large" style="margin-bottom: 10px">Užsisakyti</a>
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $offer->id }}" name="id" />
                                        <input type="hidden" value="{{ $offer->freelancerId }}" name="freelancerId" />
                                        <input type="hidden" value="{{ $offer->price }}" name="price" />
                                    </div>
                                    <a href="/projects/{{ $offer->id }}/create" class="button button-primary button-large" style="margin-bottom: 10px">Įtraukti į projektą</a>
                                @endif
                                @endauth
                            @endif
                        @endif

                        @if($reviews->count())
                            <div class="card mt-3">
                                <div class="card-header"><strong>Atsiliepimai</strong></div>
                                    @foreach ($reviews as $review)
                                        @if( $offer->id === $review->fk_offer_id)
                                            @foreach ($users as $user)
                                                <div >
                                                    {{--                                @if(Auth::check() && Auth::user()->id === $review->fk_client_id)--}}
                                                    @if( $user->id === $review->fk_client_id)
                                                        {{$user->name}} {{$user->surname}}
                                                    @endif
                                                </div>
                                            @endforeach
                                            <div class="card-body">
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $review->created_at }}</h6>
                                                <p class="card-text"><strong> {{ $review->rating }}⭐/10⭐</strong> {!! nl2br(e($review->text)) !!}</p>
                                                <hr>
                                            </div>
                                @endif
                                @endforeach
                                @if($offer->id != $review->fk_offer_id)
                                    <div class="card-body"><strong>Apgailestaujame, tačiau ši paslauga dar neturi atsiliepimų.</strong></div>
                                @endif
                            </div>
                      </div>
                  </div>
               </div>
                 <a href="/offers" class="button button-secondary button-large" style="margin-top: 20px">Atgal</a>
            @endif
        </div>
@endsection
@section('footer')
@endsection
