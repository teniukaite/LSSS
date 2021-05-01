
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

{{--                            <div class="form-group">--}}
{{--                                <label for="thumbnail_url" >Paveikslėlio nuoroda:</label>--}}
{{--                                <input type="text" name="photo" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}"  placeholder="Įveskite nuorodą, arba palikite tuščią." value="{{ $errors->any() ? old('photo') : $user->photo }}" />--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <button type="edit" class="btn btn-primary">Išsaugoti</button>--}}
{{--                            </div>--}}
<form action="/Home" method="POST" enctype="multipart/form-data">
    @csrf
                            <div class="block">
                             <input type="file"
                             class="block shadow-5xl md-10 p-2 w-75"
                             name="image">

                            </div>
    <div>
        <button class="btn btn-danger" type="submit">Pakeisti</button>
    </div>
</form>

                                <div class="card" style="width: 120px">
                                <img name="photo" class="image" src="{{ $user->photo }}"readonly/>

                            </div>
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
                            <a class="btn btn-primary" href="{{ URL::previous() }}">Atgal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
