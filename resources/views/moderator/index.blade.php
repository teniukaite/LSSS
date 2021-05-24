@extends('layouts.app')

@section('nav-items')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pradžia</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Jūs prisijungėte!

                        @if(Auth::user()->is_admin)

                            <p>
                                Peržiūrėkite <a href="{{ url('admin/tickets') }}">užklausas</a>.
                            </p>
                        @else

                            <p>
                                Peržiūrėkite savo <a href="{{ url('tickets/my_tickets') }}">užklausas</a> arba <a href="{{ url('tickets/create') }}">sukurkite naują</a>.<br>
                                Peržiūrėkite mūsų <a href="{{ url('offers/') }}">kelionių pasiūlymus</a>.
                            </p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
