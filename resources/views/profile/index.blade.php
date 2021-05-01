@extends('layouts.app')
<style>
    img {
        height: 150px;
    }
    .overlay {

        color: violet;

    }
    .container:hover .overlay {
        opacity: 1;
    }
    .btn:hover .overlay {
        opacity: 1;
    }


</style>
{{--@section('script')--}}
{{--    <script>--}}
{{--        $( document ).ready(function() {--}}
{{--            $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mano paskyra</div>
                    <div class="card-body">
                        <table class="table">
                            <th>Nuotrauka</th>
                            <img name="photo" class="image" src="{{ $user->photo }}"readonly/>
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
                                <td><a class="btn btn-warning" href="/change_password">Keisti slaptažodį</a></td>
                            </tr>
                            </tbody>
                        </table>
                        <div>
                            <a class="btn btn-primary" href="profile/edit">Redaguoti paskyrą</a>
                        </div>


                        @if(Auth::check() && Auth::user()->type==1)

                               <div>
                                  <a class="btn btn-primary" href="files/index">Peržiūrėkite savo darbų pavyzdžius</a>
                              </div>

{{--                                <div  class="container themelight" style=" width:800px" align="auto">--}}
{{--                                    <a><b>Peržiūrėkite savo darbų pavyzdžius</b></a>--}}
{{--                                <a href="files/index">--}}

{{--                                    <img class="w3 - btn" src="/img/perziureti.png" style="width: 100px; height: 100px"></a>--}}
{{--                              </div>
  <div class="overlay">Peržiūrėti</div>--}}

                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
