@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profilio redagavimas</div>

                    <div class="card-body">

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="/change_profile">
                                @csrf
                                <label for="name" class="col-md-4 control-label">Jūsų vartotojo vardas</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                </div>

                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Keisti duomenis
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
