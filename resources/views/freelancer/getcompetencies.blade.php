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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Jūsų duomenys</div>
                <div class="card-body">
            <form method="POST" action="{{config('app.url')}}/competencies">
                @method('POST')
                @csrf
                    <img name="photo" class="image" style="width: 150px" src="{{ Auth::user()->photo }}"readonly/>
                    <div>
                        <h3 style="color: black"> <b>Vardas:</b>  {{ Auth::user()->name }}</h3>
                        <h3 style="color: black"><b>Pavardė:</b>  {{ Auth::user()->surname }}</h3>
                        <h3 style="color: black"><b>Gimimo metai:</b>  {{ Auth::user()->year_of_birth }}</h3>
                        <h3 style="color: black"><b>El.paštas:</b>  {{ Auth::user()->email}}</h3>
                    </div>
                    {{--                            Išsilavinimo dailis--}}
                    <br> <br> <br>

                        <label for="$education"><h3 style="color: black"><b>Išsilavinimas:</b></h3> </label>
                        <select id="education" name="education" class="uk-select" style="color: black" >
                            <option value="" > Jūsų išsilavinimas</option>
                            <option  style="color: black">  Pagrindinis (baigta pradinė mokykla)</option>
                            <option style="color: black"> Vidurinis</option>
                            <option style="color: black"> Profesinė mokykla</option>
                            <option style="color: black"> Aukštasis koleginis</option>
                            <option style="color: black"> Aukštasis universitetinis</option>
                        </select>
                    <div class="form-input">
                        <h3 style="color: black"><b>Aprašymas:</b></h3>
                        <textarea type="text" style="color: black; width: 400px; height: 300px"  name="description" class="uk-textarea uk-form-large " placeholder="Apraškite save ir savo teikiamas paslaugas" required>  </textarea>
                    </div>
                    <button class="button button-primary button-large" type="submit" href="/freelancer/file-upload">Pateikti</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('footer')
@endsection
