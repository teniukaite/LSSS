<!DOCTYPE html>
<html lang="en-gb" dir="ltr">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LSSS</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&amp;display=swap" rel="stylesheet">
    <link href="css/main.css"  rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
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
                    <div class="uk-navbar-right">
                </div>
            </div>
        </nav>
    </div>
</header>
<div id="about" class="uk-section uk-section-muted uk-section-large">
    <div class="uk-container">
        <div class="uk-width-4-5@m">
            <h4 class="uk-heading-small"><mark>Laisvai samdomo specialisto</mark> profilis</h4>
        </div>
@foreach($allFreelancers as $freelancer)

    @if ($freelancer->id ==3)

        <div class="uk-child-width-1-1 uk-margin-large-top uk-grid-match" data-uk-grid>
            <div>
                <div class="uk-card uk-card-small uk-card-border">
                    <div class="uk-card-media-top uk-position-relative uk-light">
                        <div class="uk-position-cover uk-overlay-xlight"></div>

                        <div class="uk-position-top-left">
                            <span class="uk-text-bold uk-text-price uk-text-small"> {{ $freelancer->name }}  {{ $freelancer->surname }} </span>
                            {{--                                <img name="photo" class="uk-border-circle" alt="{{ $freelancer->name }}" src="{{ $freelancer->photo }}"readonly/>--}}
                        </div>

                    </div>
                    <br>
                    <img name="photo" class="uk-border-circle"width="200px"  alt="{{ $freelancer->name }}" src="{{ $freelancer->photo }}"readonly/>
                    <div class="uk-card-title uk-margin-small-bottom"><h6>Gimimo metai:  {{ $freelancer->year_of_birth }}</h6></div>
                    <div class="uk-text-muted uk-text-small"><h6>El.paštas:{{ $freelancer->email }}</h6></div>
                    <div class="uk-card-title uk-margin-small-bottom"><h6>Telefono numeris: {{ $freelancer->phoneNumber }}</h6></div>
                    <div class="uk-text-muted uk-text-small"><h6>Lytis: {{ $freelancer->gender }}</h6></div>
                    <div class="uk-text-muted uk-text-small"><h6>Įvertinimas: {{ $freelancer->points }} taškai</h6></div>
{{--<div class="caruk-d"></div>--}}
                    <h4 class="uk-heading-small"><mark>Visos teikiamos</mark> paslaugos</h4>
                    @foreach($allCompetencies as $competencies)
                        <div class="uk-card uk-width-1-1 uk-card-border">
                            <div class="uk-text-muted uk-text-small">  <h4 class="border"><b>Išsilavinimas:</b> {{ $competencies->education}} </h4></div>
                            <div class="uk-text-muted uk-text-small">  <h4 class="border"><b>Aprašymas:</b> {{ $competencies->description}} </h4></div>
                </div>
                    @endforeach

                    <a class="uk-button uk-button-primary uk-button-large" href="{{ URL::previous() }}">Atgal</a>

                </div>
            </div>
        </div>
    @endif
@endforeach
    </div>
</div>

<div id="about" class="uk-section uk-section-muted uk-section-large">
    <div class="uk-container">
        <div class="uk-width-4-5@m">
        </div>
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
