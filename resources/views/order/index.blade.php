@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Jūs užsisakėte</strong></div>

                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
{{--                                <th>ID</th>--}}
                                <th>Pavadinimas</th>
                                <th>Data</th>
                                <th>Kaina</th>
                                <th>Atlieka</th>
                                <th>Peržiūrėti</th>
                                <th>Šalinti</th>
                            </tr>
                            @foreach($orders as $order)
                                @foreach($offers as $offer)
                                    @if($order->fk_service_id == $offer->id)
                                <tr>
{{--                                    <td><strong>{{ $order->id }}</strong></td>--}}
                                    <td><strong>{{ $offer->service_name }}</strong></td>
                                    @foreach(\App\Models\Schedule::all() as $time)
                                        @if($time->id==$order->order_date)
                                    <td><strong>{{ $time->date }}</strong></td>
                                        @endif
                                    @endforeach
                                    <td><strong>{{ $offer->price }}</strong></td>
                                    @foreach($users as $user)
                                        @if($offer->freelancerId== $user->id)
                                    <td><strong>{{$user->name}} {{$user->surname}}</strong></td>
                                        @endif
                                    @endforeach
                                    <td><a href="/orders/{{ $order->id }}" class="btn btn-success text-white">Peržiūrėti</a></td>
{{--                                    <td><a href="/orders/{{ $order->id }}/edit" class="btn btn-primary text-white">Redaguoti</a></td>--}}
                                    <td>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
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
