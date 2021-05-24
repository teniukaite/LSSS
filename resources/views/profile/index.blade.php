<!DOCTYPE html>
<html lang="en-gb" dir="ltr">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LSSS</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&amp;display=swap" rel="stylesheet">
    <link href="css/main.css"  rel="stylesheet">
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
                    <div class="uk-navbar-right">
                        @if (Route::has('login'))
                            @auth
                                <ul class="uk-navbar-nav uk-visible@m">
                                    <li>
                                        <h2>{{ Auth::user()->name }}</h2>
                                    </li>
                                </ul>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<div id="about" class="uk-section uk-section-muted uk-section-large">
    <div class="uk-container">
        <div class="uk-width-4-5@m">
            <h2>{{ $user->name }} {{ $user->surname }}  </h2>
            <div class="uk-margin-medium-bottom" data-uk-grid>
                <div class="uk-width-1-3 uk-flex uk-flex-middle">
                    <img name="photo" class="uk-border-circle" alt="{{ $user->name }}" src="{{ $user->photo }}"readonly/>
                </div>
                <div class="uk-width-expand uk-text-small">
                    <div data-uk-grid data-uk-margin>
                        <div class="uk-width-1-2">
                            <p>El. paštas:</p>
                        </div>
                        <div class="uk-width-1-2">
                            <h4>{{ $user->email }} </h4>

                        </div>
                        <div class="uk-width-1-2">
                            <p>Telefono numeris:</p>
                        </div>
                        <div class="uk-width-1-2">
                            <h4>{{ $user->phoneNumber}} </h4>
                        </div>
                        <div class="uk-width-1-2">
                            <p>Gimimo data:</p>
                        </div>
                        <div class="uk-width-1-2">
                            <h4>{{ $user->year_of_birth}} </h4>
                        </div>
                    </div>
                </div>
            </div>
            <a href="profile/edit" class="uk-button uk-button-success-outline uk-button-large">Redaguoti</a>
            <a href="/home" class="uk-button uk-button-success-outline uk-button-large">Atgal</a>
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

