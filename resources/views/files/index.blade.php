<!DOCTYPE html>
<html>


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LSSS</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <script src="js/uikit.js" ></script>
</head>
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
</header>
<div id="about" class="uk-section uk-section-muted uk-section-large">
    <div class="uk-container">
        <div class="uk-width-4-5@m">
            <h1>Jūsų darbų pavyzdžiai</h1>
            <div>
                <button class="uk-button-large uk-button-secondary"type="submit">Įkelti daugiau pavyzdžių</button>
            </div>
            @foreach($allFiles as $files)
                @if ($files->freelancerID == Auth::user()->id)
                    <div class="card-body">
{{--                        <p><b>Pavadinimas:</b> {{ $files->name }}</p>--}}
{{--                        --}}{{--                            <p><b>Nuotrauka:</b> {{ $files->file_path }}</p>--}}

{{--                        <p><b>Freelanceris:</b> {{ $files->freelancerID }}</p>--}}
{{--                        --}}{{--                            <img src="{{asset( '/storage/upload' . $files->file_path)}}" width="200" height="200" />--}}


                        <img  src="{{ Storage::url( $files->file_path) }}">

                        {{--                            src=”{{url(storage/app/public/upload/.$files->file_path)}}--}}


                        <div>
                            <button class="uk-button-large uk-button-secondary"type="submit">Redaguoti</button>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>
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
