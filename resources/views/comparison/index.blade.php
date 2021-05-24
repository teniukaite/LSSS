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
                    <div class="card-header"><strong>Jūsų lyginamos paslaugos</strong></div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Kaina</th>
                                <th>Atlieka</th>
                                <th>Peržiūrėti</th>
                                <th>Šalinti</th>
                            </tr>
                            @foreach($comparisons as $comparison)

                                @foreach($offers as $offer)
                                    @if($offer->id == $comparison->offerId)

                                        <tr>
{{--                                            <td><strong>{{ $comparison->id }}</strong></td>--}}
                                            <td><strong>{{ $offer->service_name }}</strong></td>

                                                <td style=""><strong>{{ $offer->price}} {{ $offer->price_content }}</strong></td>


                                            @foreach($users as $user)
                                                @if($offer->freelancerId== $user->id)
                                                    <td><strong>{{$user->name}} {{$user->surname}}</strong></td>
                                                @endif
                                            @endforeach
                                            <td><a href="/offers/{{ $offer->id }}" class="btn btn-success text-white">Peržiūrėti</a></td>
                                            {{--                                    <td><a href="/orders/{{ $order->id }}/edit" class="btn btn-primary text-white">Redaguoti</a></td>--}}
                                            <td>
                                                <form   action="/comparison/{{  $comparison->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-white">Atšaukti</button>
                                                </form>
                                            </td>


                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </table>

                        <br>
                        <a class="button button-primary button-large" href="/offers ">Peržiūrėti visus paslaugų pasiūlymus</a>
                        {{--                        <a href="/orders/order-history" class="btn btn-primary text-white mb-2">Peržiūrėti užsakymų istoriją</a>--}}
                        {{--                        <br>--}}
                        {{--                        <a href="/orders/payment-history" class="btn btn-primary text-white">Peržiūrėti apmokėjimų istoriją</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection
