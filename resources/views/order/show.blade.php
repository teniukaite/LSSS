@extends('layouts.app')

@section('style')
    <style>
        .card-img-top {
            width: 100%;
            height: 30vh;
            object-fit: cover;
        }

    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Jūsų užsakytos paslaugos informacija: <strong></strong></div>

                        <div class="card-body">
                            <p><b style="width: 200px;margin-right: 0px">PASLAUGA:</b>{{ $offer->service_name }}</p>
                            <p><b style="width: 200px;margin-right: 0px">KAINA:</b> {{ $offer->price }} {{ $offer->price_content }}  </p>
                            <p><b style="width: 200px;margin-right: 0px">TRUKMĖ:</b> {{ $offer->duration}} VAL.</p>
                            <p><b style="width: 200px;margin-right: 0px">MIESTAS:</b> {{ $offer->city}} </p>
                            @foreach($users as $user)
                                @if($offer->freelancerId== $user->id)
                                @endif
                            @endforeach
                            <div> <p><b>KLIENTAS:</b>    <td> {{$client->name}} {{$client->surname}}</td></div>
                            <div> <p><b>UŽSAKYMO LAIKAS:</b>    <td>{{substr($orderTime->created_at,0,16)}}</td></div>
                            <div> <p><b>ATLIKIMO LAIKAS:</b>    <td>{{$orderTime->date}} {{substr($orderTime->time,0,5)}} </td></div>
                            <div> <p><b>KOMENTARAS:</b>    <td>{{$order->comment}}</td></div>
                            <div> <p><b>KLIENTO EL.PAŠTAS:</b>    <td>{{$client->email}} </td></div>
                            <div> <p><b>KLIENTO GIMIMO DATA:</b>    <td>{{$client->year_of_birth}} </td></div>
                            <div> <p><b>KLIENTO TURIMI TAŠKAI:</b>    <td>{{$client->points}} </td></div>
                           <hr>
                           <a class="button button-primary" href="{{ URL::previous() }}">Atgal</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection
@section('footer')
@endsection

