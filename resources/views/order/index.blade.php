
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card">
                    <div class="card-header"><strong>Jūsų užsakymai</strong></div>
                    <hr style="border-bottom: 3px solid #A57982">
                    <div class="text">UŽSAKYTOS PASLAUGOS </div>
                    <hr style="border-bottom: 3px solid #A57982">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
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
                                        @foreach(\App\Models\Schedule::all() as $time)
                                            @if($time->date > Carbon\Carbon::now()->format('Y-m-d'))
                                                <tr>
                                                @if($time->id==$order->order_date )
                                                 <tr>
                                                <td><strong>{{ $offer->service_name }}</strong></td>
                                                <td><strong>{{ $time->date }} {{ $time->time}}</strong></td>
                                                <td><strong>{{ $offer->price }} {{ $offer->price_content}}</strong></td>
                                              @foreach($users as $user)
                                                @if($offer->freelancerId== $user->id)
                                                 <td><strong>{{$user->name}} {{$user->surname}}</strong></td>
                                                 @endif
                                              @endforeach
                                           <td><a href="/orders/{{ $order->id }}" class="btn btn-success text-white">Peržiūrėti</a></td>
                                    <td>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-white">Atšaukti</button>
                                        </form>
                                    </td>
                                </tr>
                                            @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </table>
                        <hr style="border-bottom: 3px solid #A57982">
                        <div class="text">UŽSAKYTI PROJEKTAI</div>
                        <hr style="border-bottom: 3px solid #A57982">
                        <table class="table table-striped">
                            <tr>
                                <th>Projekto pavadinimas</th>
                                <th>Paslauga</th>
                                <th>Data</th>
                                <th>Kaina</th>
                                <th>Atlieka</th>
                                <th>Peržiūrėti</th>
                                <th>Šalinti</th>
                            </tr>
                            @foreach($projects as $project)

                                @foreach($offers as $offer)

                                    @if($project->fk_service_id == $offer->id)
                                        <tr>
                                            <td class="card-header">{{$project->project_name}}</td>
                                            <td><strong>{{ $offer->service_name }}</strong></td>
                                            @foreach(\App\Models\Schedule::All()->where('date','>',Carbon\Carbon::now()->format('Y-m-d'))->sortBy(function ($inquiry) {
                              return sprintf('%s%s', $inquiry->date, $inquiry->time);
                          })->values() as $time)
                                                @if($time->id==$project->time_id)
                                                    <td><strong>{{ $time->date }} {{ $time->time}}</strong></td>
                                                @endif
                                            @endforeach
                                            <td><strong>{{ $offer->price }} {{ $offer->price_content}}</strong></td>
                                            @foreach($users as $user)
                                                @if($offer->freelancerId== $user->id)
                                                    <td><strong>{{$user->name}} {{$user->surname}}</strong></td>
                                                @endif
                                            @endforeach
                                            <td><a href="/offers/{{ $offer->id }}" class="btn btn-success text-white">Peržiūrėti</a></td>
                                            <td>
                                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
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
                        <hr style="border-bottom: 3px solid #A57982">
                        </table>
                        <div class="text">UŽBAIGTI UŽSAKYMAI</div>
                        <hr style="border-bottom: 3px solid #A57982">
                        <table class="table table-striped">
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Data</th>
                                <th>Kaina</th>
                                <th>Atlieka</th>
                                <th>Atsiliepimas</th>
                            </tr>

                            @foreach($orders as $order)
                                @foreach($offers as $offer)
                                    @if($order->fk_service_id == $offer->id)
                                        @foreach(\App\Models\Schedule::all() as $time)
                                            @if($time->date <= Carbon\Carbon::now()->format('Y-m-d'))
                                        <tr>
                                                @if($time->id==$order->order_date )
                                                <td><strong>{{ $offer->service_name }}</strong></td>
                                                    <td><strong>{{ $time->date }} {{ $time->time}}</strong></td>
                                            <td><strong>{{ $offer->price }} {{ $offer->price_content}}</strong></td>
                                            @foreach($users as $user)
                                                @if($offer->freelancerId== $user->id)
                                                    <td><strong>{{$user->name}} {{$user->surname}}</strong></td>
                                                @endif
                                            @endforeach
                                            <td><a href="offers/{{$offer->id}}/review/" class="btn btn-success text-white">Palikti atsiliepimą</a></td>
                                        </tr>
                                            @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </table>
                        <br>
                        <a class="button button-primary button-large" href="/offers ">Peržiūrėti visus paslaugų pasiūlymus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
