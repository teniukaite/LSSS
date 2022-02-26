@extends('layouts.admin_navbar')
@section('content')
        <form method="POST" action="{{ route('password.update') }}">
            @csrf


            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Kategorijos pavadinimas</label>

                <div class="col-md-6">
                    <input id="category" type="text" class="form-control {{ $category['name'] }}>
                </div>
            </div>

            <div class="form-group row mb-0">
                    <a class="bg-primary" href="{{ URL::previous() }}">Išsaugoti</a>
                </div>
            </div>
        </form>

@endsection
