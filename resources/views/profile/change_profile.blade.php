@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profilio redagavimas</div>

                    <div class="card-body">

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="/change_profile" enctype="multipart/form-data">
                                @csrf
                                <label for="name" class="col-md-4 control-label">Jūsų vartotojo vardas</label>

                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>

                                <label for="surname" class="col-md-4 control-label">Jūsų pavardė</label>
                                <input type="text" name="surname" class="form-control" value="{{ $user->surname }}"required>

                                <label for="email" class="col-md-4 control-label">El. paštas</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}"required>

                                <label for="phoneNumber" class="col-md-4 control-label">Telefono numeris</label>
                                <input type="text" name="phoneNumber" class="form-control" value="{{ $user->phoneNumber }}"required>
{{--                                <input type="file" name="photo" class="form-control">--}}
{{--                                <img src="{{asset('/uploads'. $user->photo)}}" alt="">--}}
                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Keisti duomenis
                                        </button>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <a href="/profile" >Atgal</a>
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
