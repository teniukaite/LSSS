@extends('layouts.admin_navbar')

@section('content')
    <div class="container" style="font-size: 20px">
        <div id="categories">
            <h2 style="font-size: 30px;padding-top: 20px;padding-bottom: 20px;">Naujienos: </h2>
            <p> Per paskutinias 24h. prie sistemos prisiregistravo: {{$count}} naudotojų</p>
@endsection
