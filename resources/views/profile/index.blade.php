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
                    <div class="card-header"><strong>jūsų profilis</strong></div>
                    <div class="card-body ">
            <h2>{{ $user->name }} {{ $user->surname }}  </h2>
            <div class="margin-medium-bottom" data-uk-grid>
                <div class="width-1-3flex flex-middle">
                    <img name="photo" class="uk-border-circle" style="max-width: 200px; border-radius: 20%; margin-bottom: 20px; margin-top: 20px" alt="{{ $user->name }}" src="{{ $user->photo }}"readonly/>
                </div>
                        <div class="width-1-2">
                            <h4><b>El. paštas: </b>{{ $user->email }}</h4>
                        </div>
                        <div class="width-1-2">
                            <h4><b>Telefono numeris: </b>{{ $user->phoneNumber}}</h4>
                        </div>
                        <div class="uk-width-1-2">
                            <h4><b>Gimimo data: </b>{{ $user->year_of_birth}}</h4>
                        </div>
                        @if($user->type == 1)
                            @foreach($freelancers as $freelancer)
                             <h1>  {{$freelancer->freelancderID}}</h1>
                                @if($user->id == $freelancer->freelancerID)
                                    <div class="uk-width-1-2" style="width: 500px;margin-right: auto;margin-left: auto">

                                        <h4><b>Išsilavinimas: </b>{{ $freelancer->education}}</h4>
                                        <h4><b>Aprašymas: </b>{{ $freelancer->description}}</h4>
                                    </div>
                                @endif
                            @endforeach
                        @endif
            </div>
             <hr style="color: rgb(204, 51, 153); border-bottom: 3px solid rgb(204, 51, 153)">
            <a href="profile/edit" class="button button-primary button-large" style="margin-right: 20px">Redaguoti</a>
            <a href="/home" class="button button-secondary button-large">Mano paskyra</a>
                    </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@endsection

