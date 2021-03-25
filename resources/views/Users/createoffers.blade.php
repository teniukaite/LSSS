@extends('layouts.app')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>


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
                <label>Aprašymas</label><input type="text" name="description">
            </div>
            <div class="form-input">
                <label>Kaina</label><input type="number" name="price">
            </div>

            <div class="form-input">
                <label>Registracijos laikai</label><input type="datetime" name="registration_times">


            </div>
            <div class="form-input">
                <label>Freelancer id</label><input type="number" name="freelancerId">
            </div>
            <button type="submit">Įkelti</button>
        </form>
    </div>
</div>
</body>
@endsection
















</html>
