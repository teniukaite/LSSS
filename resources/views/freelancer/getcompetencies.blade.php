<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LSSS</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&amp;display=swap" rel="stylesheet">
    {{--    <link href="css/main.css" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <script src="js/uikit.js"></script>
</head>



<header class="uk-cover-container uk-background-cover uk-background-norepeat uk-background-center-center">
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
</header>
<div id="about" class="uk-section uk-section-muted uk-section-large">
    <div class="uk-container uk-container-small uk-text-center">
        <div class="uk-card uk-card-secondary border-top" style="background-color: #CFB3CD;">
            <form method="POST" action="{{config('app.url')}}/competencies">
                @method('POST')
                @csrf
                <div class="uk-card-header"><h1>Jūsų duomenys</h1></div>
                <div class="uk-container ">
                    <img name="photo" class="image" style="width: 150px" src="{{ Auth::user()->photo }}"readonly/>
                    <div>
                        <h3 style="color: black"> <b>Vardas:</b>  {{ Auth::user()->name }}</h3>
                        <h3 style="color: black"><b>Pavardė:</b>  {{ Auth::user()->surname }}</h3>
                        <h3 style="color: black"><b>Gimimo metai:</b>  {{ Auth::user()->year_of_birth }}</h3>
                        <h3 style="color: black"><b>El.paštas:</b>  {{ Auth::user()->email}}</h3>
                    </div>
                </div>
                <div class="uk-card-body">

                    {{--                            Išsilavinimo dailis--}}
                    <br> <br> <br>
                    <div class="form-group">
                        <label for="$education"><h3 style="color: black"><b>Išsilavinimas:</b></h3> </label>
                        <select id="education" name="education" class="uk-select" style="color: black" >
                            <option value="" > Jūsų išsilavinimas</option>
                            <option  style="color: black">  Pagrindinis (baigta pradinė mokykla)</option>
                            <option style="color: black"> Vidurinis</option>
                            <option style="color: black"> Profesinė mokykla</option>
                            <option style="color: black"> Aukštasis koleginis</option>
                            <option style="color: black"> Aukštasis universitetinis</option>
                        </select>
                    </div>
                    {{--                            Kategorijos pasirinkimo dalis--}}

                    {{--                                <label  for="$categories"><p><b>Kategorijos:</b></p></label>--}}
                    {{--                                <select class="form-control {{ $errors->has('categories') ? 'is-invalid' : '' }}"  name="categories">--}}
                    {{--                                    <option value="">Pasirinkite kokios srities paslaugas siūlote:</option>--}}
                    {{--                                    @foreach(App\Models\Categories::all() as $type)--}}
                    {{--                                        <option {{ old('categories')==$type->id ? 'selected' : '' }} value="{{$type->id}}">{{$type->name}}</option>--}}
                    {{--                                    @endforeach--}}
                    {{--                                </select>--}}

                    {{--                            Aprašymas--}}
                    <div class="form-input">
                        <h3 style="color: black"><b>Aprašymas:</b></h3>
                        <textarea type="text" style="color: black; width: 2000px; height: 300px"  name="description" class="uk-textarea uk-form-large " placeholder="Apraškite save ir savo teikiamas paslaugas">  </textarea>
                    </div>

                    {{--                            <input type="image" align="right" src="/img/Pateikti.jpg" alt="Submit"  width="150" height="100" href="/freelancer/file-upload">--}}
                    <button class="uk-button uk-button-primary uk-button-large" type="submit" href="/freelancer/file-upload">Pateikti</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <footer class="uk-border-dark-top">
        <div class="uk-section uk-section-secondary">
            <div class="uk-container uk-h6">
                <div class="uk-flex-first@m">
                    <div>
                        <a href="#" class="uk-logo">Į viršų</a>
                    </div>
                    <h2>   LSSS - Laisvai samdomų specialistų sistema - 2021.</h2>
                    <h3><a href="mailto:karrad@ktu.edu">Karolina Radzevičiūtė</a></h3>
                </div>
            </div>
        </div>
</footer>
</body>
</html>
