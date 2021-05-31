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
         <h1 style="color: rgb(204, 0, 153);"><b>TVARKARAŠTIS </b></h1><br>
        <div class="row justify-content-center">
            <div class="col-md-14">
                <div class="card">
                    <div class="card-header"> Jūsų užimtumo grafikas:</div>
                    <div class="card-body">
                        @forelse($allOffers->chunk(2) as $offerChunk)
                            <div class="row hidden-md-up mb-1">
                                @foreach ($offerChunk as $offer)
                                    <div class="col-md-6">
                                        <div class="card m-1">
                                            <div class="card-body">
                                                <h3 class="card-title"><b>{{$offer->service_name}}</b></h3>
                                                <p class="card-text">
                                                    KAINA: {{$offer->price}} {{$offer->price_content}}<br>
                                                    MIESTAS: {{ ucfirst($offer->city)}}
                                                <table class="table table-striped" style="border: none">
                                                    <tr>
                                                        <th>UŽSAKYMO DATA</th>
                                                        <th>ATLIKIMO DATA</th>
                                                    </tr>
                                                @foreach($times as $time)
                                                    @if($time->offer_id == $offer->id && $time->status==1)
                                                         <tr>
                                                           <td><h4 style="color:#cc0099"><b>{{ $time->created_at}} </b></h4></td>
                                                            <td> <h4 style="color:#cc0099"><b>{{ $time->date}}  {{ substr($time->time, 0, 5)}}</b></h4></td>
                                                         </tr>
                                                    @endif
                                                @endforeach
                                                </table>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a href="/offers/{{ $offer->id }}" class="btn btn-success  btn-block ">PERŽIŪRĖTI</a>
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
         <div class="container" style="margin-top: 50px">
             <div class="row justify-content-center">
                 <div class="col-md-14">
                     <div class="card">
                         <div class="card-header">  Laisvi registracijos laikai:</div>
                         <div class="card-body">
                             @forelse($allOffers->chunk(2) as $offerChunk)
                                 <div class="row hidden-md-up mb-1">
                                     @foreach ($offerChunk as $offer)
                                         <div class="col-md-6">
                                             <div class="card m-1">
                                                     <h3 class="card-header"><b>{{$offer->service_name}}</b></h3>
                                                     <p class="card-text">
                                                         KAINA: {{$offer->price}} {{$offer->price_content}}<br>
                                                         MIESTAS: {{ ucfirst($offer->city)}}
                                                     <table class="table table-striped" style="border: none">
                                                         <tr>
                                                             <th>LAIKAS</th>
                                                             <th>VEIKSMAS</th>
                                                         </tr>
                                                     @foreach($times as $time)
                                                         @if($time->offer_id == $offer->id && $time->status==0)
                                                           <tr>
                                                            <td><strong>{{ $time->date}}  {{ substr($time->time, 0, 5)}}</strong></td>
                                                                 <form action="/schedule/{{ $time->id }}" method="POST">
                                                                       @csrf
                                                                        @method('DELETE')
                                                                           <div>
                                                                            <td><button class="button button-secondary button-large" type="submit" style="margin-bottom: 10px; background-color: #ff0000!important;">PAŠALINTI</button></td>
                                                                            </div>
                                                                 </form></strong></td>
                                                             </tr>
                                                         @endif
                                                     @endforeach
                                                     </table>
                                                 <div class="card-footer text-center">
                                                     <a href="/schedule/{{ $offer->id }}/addTime"  class="button button-primary button-large" style="background-color: #009900!important;">PRIDĖTI REGISTRACIJOS LAIKĄ</a>
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
             <a href="/home" class="button button-secondary button-large" style="margin-top: 20px">Atgal</a>
    </div>
@endsection
@section('footer')
@endsection


