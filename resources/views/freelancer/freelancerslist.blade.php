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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Laisvai samdomi specialistai</h2></div>
                    <br>
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
                            <div class="card-body">
                                @forelse($allFreelancers->chunk(3) as $freelancerChunk)
                                    <div class="row hidden-md-up mb-2">
                                        @foreach ($freelancerChunk as $freelancer)
                                            @if ($freelancer->type == 1)
                                                <div class="col-md-4">
                                                    <div class="card m-1" style="height: 550px">
                                                        <img style="width: 200px; height: 200px; border-radius: 20%;margin-left: auto;margin-right: auto; margin-top: 20px" alt="{{ $freelancer->name }}" src="{{ $freelancer->photo }}"
                                                             onerror="this.onerror=null; this.src='https://bulma.io/images/placeholders/1280x960.png'" class="card-img-top" alt="...">
                                                        <div class="card-body" style="margin-top: 10px">
                                                            <h3 class="card-title"><b>{{ $freelancer->name }}  {{ $freelancer->surname }}</b></h3>
                                                            <p class="card-text">
                                                                Gimimo metai:  {{ $freelancer->year_of_birth }}<br>
                                                                El.paštas:{{ $freelancer->email}}<br>
                                                                Telefono numeris: {{ $freelancer->phoneNumber }}<br>
{{--                                                                Įvertinimas: {{ $freelancer->points }} taškai--}}
                                                            </p>
                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <a href="/freelancers/{{ $freelancer->id }}" class="button button-secondary btn-block ">Peržiūrėti</a>
                                                            @auth
                                                                <form method="POST" action="/comparison">
                                                                    @method('POST')
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <input type="hidden" value="{{ $freelancer->id }}" name="id" />
                                                                    </div>

                                                                </form>
                                                            @endauth
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @empty
                                    <div class="alert alert-danger">
                                        Šiuo metu neturime pasiūlymų, atitinkančių Jūsų paiešką  <i class="material-icons" style="width: 200px">priority_high</i>
                                    </div>
                                @endforelse
                        <div class="text-center" style="margin: 1em 0em;">
                            {{$allFreelancers->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection
