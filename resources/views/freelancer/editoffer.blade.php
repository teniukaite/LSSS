<!DOCTYPE html>
<html lang="en-gb" dir="ltr">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LSSS</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <script src="js/uikit.js" ></script>
</head>
<body>
<header class="uk-cover-container uk-background-cover uk-background-norepeat uk-background-center-center"
        style="background-image: url(img/logo4.png);">
    <div class="uk-overlay uk-position-cover uk-overlay-video"></div>
    <div data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container;
	  cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; top: 500">
        <nav class="uk-navbar-container uk-letter-spacing-small uk-text-bold">
            <div class="uk-container uk-container-large">
                <div class="uk-position-z-index" data-uk-navbar>
                    <div class="uk-navbar">
                        <a class="uk-navbar-item uk-logo" href="/">Pagrindinis</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    </div>
</header>
<div id="about" class="uk-section uk-section-muted uk-section-large">
    <div class="uk-container">
        <h3> Pasiūlymo redagavimas:</h3>

        <form method="POST" action="/offers/{{ $offer->id }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name" >Pavadinimas:</label>
                <input type="text" name="service_name"  class="uk-textarea uk-input {{ $errors->has('service_name') ? 'is-invalid' : '' }}"  placeholder="Įveskite pavadinimą:" value="{{ $errors->any() ? old('service_name') : $offer->service_name }}" />

            </div>

            <div class="form-group" >
                <label  for="description">Aprašymas:</label>
                <input type="text" name="description" class="uk-input{{ $errors->has('description') ? 'is-invalid' : '' }}"  placeholder="Aprašykite savo pasiūlymą:" value="{{ $errors->any() ? old('description') : $offer->description }}" />
{{--                <textarea  type="text"  name="description" cols="50" class=" {{ $errors->has('description') ? 'is-invalid' : '' }}"  placeholder="Aprašykite savo pasiūlymą:" value="{{ $errors->any() ? old('description') : $offer->description }}"></textarea>--}}
            </div>
            <div class="form-group">
                <label  for="price">Kaina:</label>
                <input type="number" name="price" class="uk-input{{ $errors->has('price') ? 'is-invalid' : '' }}"  placeholder="Įveskite kainą:" value="{{ $errors->any() ? old('price') : $offer->price }}" />
            </div>
            <div class="form-group">
                <label for="city" >Miestas:</label>
                <input type="text" name="city" class="uk-input {{ $errors->has('city') ? 'is-invalid' : '' }}"  placeholder="Miestas, kuriame bus atliekama paslauga" value="{{ $errors->any() ? old('city') : $offer->city }}" />
            </div>
            <div class="form-group">
                <label  for="category">Kategorija:</label>
                <select class="uk- uk-select-large uk-select-light  {{ $errors->has('category') ? 'is-invalid' : '' }}" style="width: 100%" name="category">
                    <option class="uk-select" style="font-size: 20px" value="" >Pasirinkite kategoriją</option>
                    @foreach(App\Models\Categories::all() as $type)
                        <option @if (!$errors->any()) {{ $offer->category==$type->id ? 'selected' : '' }} @else {{ old('category')==$type->id ? 'selected' : ''}} @endif value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="uk-button uk-button-primary uk-button-large">Išsaugoti</button>
                <a class="uk-button uk-button-secondary uk-button-large" href="{{ URL::previous() }}">Atgal</a>
            </div>

        </form>

        <form action="/offers/{{ $offer->id }}" method="POST">
            @csrf
            @method('DELETE')
            <div>
                <button class="uk-button uk-button-danger uk-button-large" type="submit">Pašalinti pasiūlymą</button>
            </div>
        </form>
        </form>
    </div>
</div>
<footer class="uk-border-dark-top">
    <div class="uk-section uk-section-secondary">
        <div class="uk-container uk-h6">
            <div class="uk-flex-first@m">
                <h2>   LSSS - Laisvai samdomų specialistų sistema - 2021.</h2>
                <h3><a href="mailto:karrad@ktu.edu">Karolina Radzevičiūtė</a></h3>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
