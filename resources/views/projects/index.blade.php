@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Jūsų kuriamas projektas</strong></div>
                    <div class="card-body">
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
                        <table class="table table-striped">
                            <tr>
                                <th>Paslauga</th>
                                <th>Pridėjimo data</th>
                                <th>Kaina</th>
                                <th>Trukmė</th>
                                <th>Atlieka</th>
                                <th>Peržiūrėti</th>
                                <th>Šalinti</th>
                            </tr>
                            @forelse($projects as $project)
                                @foreach($offers as $offer)
                                    @if($project->fk_service_id == $offer->id && $project->status==0)
                                        <tr>

                                            <td><strong>{{ $offer->service_name }}</strong></td>
                                            @foreach(\App\Models\Schedule::all() as $time)
                                            @endforeach
                                            <td><strong>{{ $project->created_at }}</strong></td>
                                            <td><strong>{{ $offer->price }} {{ $offer->price_content}}</strong></td>
                                            <td><strong>{{ $offer->duration}}</strong></td>
                                            @foreach($users as $user)
                                                @if($offer->freelancerId== $user->id)
                                                    <td><strong>{{$user->name}} {{$user->surname}}</strong></td>
                                                @endif
                                            @endforeach
                                            <td><a href="/offers/{{ $offer->id }}" class="button button-secondary">Peržiūrėti</a></td>
                                            <td>
                                                <form action="/projects/{{ $project->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div>
                                                        <button class="button button-danger" type="submit">Pašalinti </button>
                                                    </div>
                                                </form>
                                        </tr>
                                    @endif
                                @endforeach
                                    @empty
                                        <div class="alert alert-success">
                                            Jūs neturite pradėto kurti projekto. Paslaugų peržiūros puslapyje išsirinkite reikiamas paslaugas ir paspauskite ,,Įtraukti į projektą"</i>
                                        </div>
                            @endforelse
                            <th style="color: #800060">KAINA </th> <td style="color: #800060">IŠ VISO</td>
                            <td style="color: #800060;"><strong>{{$sum}} </strong> </td>
                            <td style="color: #800060">EUR. </td>
                        </table>

                        <form method="POST" action="/projects/order">
                            @method('POST')
                            @csrf
                            <label for="project_name" class="col-md-4 control-label">Projekto pavadinimas</label>
                            <input type="text" name="project_name" class="form-control"required><br>
                            <i style="color: #52527a">Prieš užsisakant įveskite projekto pavadinimą</i>

                            <div class="form-group" style="margin-top: 15px">
                                <button type="submit" class="button button-primary button-large">UŽSAKYTI</button>
                            </div>
                        </form>
                        <br>
                        <a class="button button-primary button-large" href="/offers ">Peržiūrėti visus paslaugų pasiūlymus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
