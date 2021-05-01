@extends('layouts.app')
<style>
    .button1 {

        color: black;

        border-radius: 50%;
    }
    .button2{
        color: black;
        border-radius: 50%;
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row-cols-md-12">
                <div class="card">
                    <div class="card-header themeblack center"><h4> Ar tikrai norite tapti laisvai samdomu specialistu ir teikti savo paslaugas?</h4></div>
                    <div class="card-body">
                    <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-4">
                    <tr>
                     <a class="button button2" type="submit" href="/freelancer/getcompetencies">Taip</a>
                        <a class="button button1" type="submit" href="/">Ne</a>
                    </tr>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

        <div class="col-md-10 offset-md-1 ">
    <div class="alert alert-info center">
        <h4>Informacija!</h4>
        <h3>Norėdami teikti savo paslaugas savo paslaugas turėsite užpildyti    <br> laisvai samdomo darbuotojo registracijos formą. </h3>
        <img  src="https://www.abmadvocates.com/wp-content/uploads/2020/03/registration-form-icon-png-.png" align="center" width="5%" height="5%"/>
    </div>

    </div>
@endsection
