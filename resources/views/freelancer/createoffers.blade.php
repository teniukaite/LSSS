@extends('layouts.app')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
<style>
    .m_title {display:inline-block}
.m_title:first-letter {text-transform: uppercase}
    </style>

@section('content')
<head>
    <title> Pridėkite paslaugą</title>
    <!--styling etc. -->
</head>
<body>
<div class="flex-center position-ref full-heigt">
    <div class="content">
        <form method="POST" action="{{config('app.url')}}/offers">
            @method('POST')
            @csrf

            <h1>Aprašykite ir įkelkite savo paslaugą!</h1>
            <div class="form-input">
                <label>Pavadinimas</label><input type="text" name="service_name">
            </div>
            <div class="form-input">
                <label>Aprašymas</label><textarea  name="description" rows="4" cols="50">  </textarea>
            </div>
            <div class="form-input">
                <label>Kaina</label><input type="number" min="0" name="price" required="required">

            </div>

{{--            <div class="form-input">--}}
{{--                <label>Registracijos laikai</label><input type="datetime" name="registration_times">--}}


{{--            </div>--}}

            <label  for="$category"><p><b>Kategorija:</b></p></label>
            <select class="form-control {{ $errors->has('categories') ? 'is-invalid' : '' }}"  name="category">
                <option value="">Nustatykite paslaugos kategoriją:</option>
                @foreach(App\Models\Categories::all() as $type)
                    <option {{ old('category')==$type->id ? 'selected' : '' }} value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>


            <div class="form-input">
                <label>Miestas</label><input class="m_title" type="text" name="city">
            </div>

            <button type="submit">Įkelti</button>
        </form>
    </div>
</div>
</body>
@endsection
















</html>
