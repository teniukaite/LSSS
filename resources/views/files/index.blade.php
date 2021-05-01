@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Jūsų įkelti darbų pavyzdžiai</strong></div>
{{--                    <img src="storage/app/public/upload/1619632894_IMG_0051.JPG">--}}
{{--                    <img src="upload/1619632894_IMG_0051.JPG">--}}

{{--                    <img src="storage/upload/{{1619632894_IMG_0051}}">--}}

                    @foreach($allFiles as $files)
                        <div class="card-body">
                            <p><b>Pavadinimas:</b> {{ $files->name }}</p>
{{--                            <p><b>Nuotrauka:</b> {{ $files->file_path }}</p>--}}

                            <p><b>Freelanceris:</b> {{ $files->freelancerID }}</p>
{{--                            <img src="{{asset( '/storage/upload' . $files->file_path)}}" width="200" height="200" />--}}


                            <img src="{{ Storage::url( $files->file_path) }}">

{{--                            src=”{{url(storage/app/public/upload/.$files->file_path)}}--}}



                        </div>
                      @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
