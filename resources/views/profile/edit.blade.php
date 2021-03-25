
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
                                <th>Slaptažodžio keitimas</th>
                                <th>Redaguoti anketą</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <form>
                                <td><input type="text" name="name" class="form-control" value="{{ $user->name }}"readonly></td>
                                <td><input type="email" name="email" class="form-control" value="{{ $user->email }}"readonly></td>
                                <td><a class="btn btn-warning" href="/change_password">Keisti slaptažodį</a></td>
                                <td><a class="btn btn-warning" href="/change_profile">Redaguoti anketą</a></td>
                                </form>


                            </tr>
                            </tbody>
                        </table>
                        <form action="/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <div>
                                <button class="btn btn-danger" type="submit">Pašalinti anketą</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
