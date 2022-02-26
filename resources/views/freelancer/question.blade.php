@extends('layouts.app')

@section('style')
    <style>
        .card-img-top {
            width: 100%;
            height: 30vh;
            object-fit: cover;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card">
                 <div class="uk-container uk-container-small uk-text-center">
                     <h2 class="card-header">Ar tikrai norite tapti laisvai samdomu specialistu ir teikti savo paslaugas?</h2>
                     <div class="card-body">
                      <a class="button button-primary button-large" style="margin-top: 20px; width: 200px; height: 50px; margin-left: 20px; margin-right: 50px; margin-bottom: 50px" type="submit" href="/freelancer/getcompetencies">Taip</a>
                      <a class="button button-danger button-large " style="margin-top: 20px;width: 200px; height: 50px; margin-bottom: 50px" type="submit" href="/">Ne</a>
                    </div>
                </div>
             </div>
        </div>
    </div>
    </div>
@endsection
@section('footer')
@endsection
