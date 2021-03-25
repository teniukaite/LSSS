@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mano paskyra</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="justify-content-center">
                            <tr>
                                <th>Vartotojo vardas</th>
                                <th>El.paštas</th>
                                <th>Naujienlaiškio prenumerata</th>
                                <th>Slaptažodžio keitimas</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a class="btn btn-warning" href="/subscribe">Prenumeruoti</a></td>
                                <td><a class="btn btn-warning" href="/change_profile">Keisti slaptažodį</a></td>
                            </tr>
                            </tbody>
                        </table>
                        <div>
                            <a class="btn btn-primary" href="profile/edit">Redaguoti paskyrą</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
