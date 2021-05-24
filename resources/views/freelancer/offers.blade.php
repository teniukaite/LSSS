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
        <div class="uk-width-4-5@m">
            <h2 class="uk-heading-small"><mark>Jūsų</mark> teikiamos <mark> paslaugos</mark></h2>
        </div>
         <a class="uk-button uk-button-primary uk-button-large" type="submit" href="/files/index">Mano darbų pazydžiai</a>
        <a class="uk-button uk-button-secondary uk-button-large" type="submit" href="/freelancer/createoffers">Įkelti naują pasiūlymą</a>
        @foreach($allOffers as $offers)
        <div class="uk-child-width-auto\@s uk-child-width-auto\@s uk-margin-large-top uk-grid-match" data-uk-grid>
            <div>
                <div class="uk-card uk-card-small uk-card-border">
                    <div class="uk-card-media-top uk-position-relative uk-light">
                        <div class="uk-position-cover uk-overlay-xlight"></div>

                        <div class="uk-position-top-left">
                            <span class="uk-text-bold uk-text-price uk-text-small"> {{ $offers->price }} eur.</span>
                        </div>

                    </div>

                    <div class="uk-card-body">
                        <br>
                        <h3 class="uk-card-title uk-margin-small-bottom">{{ $offers->service_name }}</h3>
                        <div class="uk-text-muted uk-text-small">{{ $offers->description }}</div>
                        <h3 class="uk-card-title uk-margin-small-bottom"> {{ $offers->city }}</h3>
                        <div class="uk-text-muted uk-text-small">{{ $offers->registration_times }}</div>

                        @foreach($categories as $category)
                            @if ($category->id == $offers->category)
                                <h4 class="border"><b>Kategorija:</b> {{ $category->name}} </h4>
                            @endif
                        @endforeach

                    </div>

                    <a href="/offers/{{ $offers->id }}/edit" class="uk-button uk-button-primary uk-button-large">Redaguoti</a>

                </div>
            </div>
        </div>
        @endforeach
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
