@extends('layouts.app')
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>--}}
<style>
    .float-container {

        padding: 20px;
    }

    .float-child {
        width: 50%;
        float: left;
        padding: 20px;
    }

</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <form method="POST" action="{{config('app.url')}}/competencies">
                        @method('POST')
                        @csrf
                        <div class="card-header themeblack"><h4>Jūsų duomenys</h4></div>

                        <div class="float-container">
                            <img name="photo" class="image" style="width: 150px" src="{{ Auth::user()->photo }}"readonly/>
                            <div class="float-child">
                            <p><b>Vardas:</b>  {{ Auth::user()->name }}</p>
                            <p><b>Pavardė:</b>  {{ Auth::user()->surname }}</p>
                                <p><b>Gimimo metai:</b>  {{ Auth::user()->year_of_birth }}</p>
                                <p><b>El.paštas:</b>  {{ Auth::user()->email}}</p>
                            </div>
                        </div>
                        <div class="card-body">

{{--                            Išsilavinimo dailis--}}
                            <br> <br>
                            <div class="form-group">
                                <label for="$education" style="text-align: right"><p><b>Išsilavinimas:</b></p> </label>
                                <select id="education" name="education" >
                                    <option value="" > Jūsų išsilavinimas</option>
                                    <option >  Pagrindinis (baigta pradinė mokykla)</option>
                                    <option > Vidurinis</option>
                                    <option > Profesinė mokykla</option>
                                    <option> Aukštasis koleginis</option>
                                    <option> Aukštasis universitetinis</option>
                                </select>
                            </div>
{{--                            Kategorijos pasirinkimo dalis--}}

                                <label  for="$categories"><p><b>Kategorijos:</b></p></label>
                                <select class="form-control {{ $errors->has('categories') ? 'is-invalid' : '' }}"  name="categories">
                                    <option value="">Pasirinkite kokios srities paslaugas siūlote:</option>
                                    @foreach(App\Models\Categories::all() as $type)
                                        <option {{ old('categories')==$type->id ? 'selected' : '' }} value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>

{{--                            Aprašymas--}}
                            <div class="form-input">
                             <p><b>Aprašymas:</b></p>
                                <textarea type="text"  name="description" style="width: 600px; height: 150px; text-align: left; vertical-align: top;
                                        font-size: 14px;" placeholder="Apraškite save ir savo teikiamas paslaugas">  </textarea>
                            </div>

{{--                            <input type="image" align="right" src="/img/Pateikti.jpg" alt="Submit"  width="150" height="100" href="/freelancer/file-upload">--}}
                                <button class="button" type="submit" href="/freelancer/file-upload">Pateikti</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>






@endsection
