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
                    <h2>Profilio redagavimas</h2>
                    <form method="POST" action="/profile" enctype="multipart/form-data">
                        @csrf

{{--                        @method('POST')--}}
                        <label for="name" class="uk-form-labell">Jūsų vardas</label>

                        <input id="name" type="text" class="uk-input uk-form-large" name="name" value="{{ $user->name }}" required>

                        <label for="surname" class="uk-form-labell">Jūsų pavardė</label>
                        <input type="text" name="surname" class="uk-input uk-form-large" value="{{ $user->surname }}"required>

                        <label for="email" class="uk-form-labell">El. paštas</label>
                        <input type="email" name="email" class="uk-input uk-form-large" value="{{ $user->email }}"required>

                        <label for="phoneNumber" class="uk-form-labell">Telefono numeris</label>
                        <input type="text" name="phoneNumber" class="uk-input uk-form-large" value="{{ $user->phoneNumber }}"required>
                        {{--                                <input type="file" name="photo" class="form-control">--}}
                        {{--                                <img src="{{asset('/uploads'. $user->photo)}}" alt="">--}}
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit" class="uk-button uk-button-primary uk-button-large">Išsaugoti</button>
                        <a href="/profile/change_password" class="uk-button uk-button-primary uk-button-large">Keisti slaptažodį</a>
                        <a href="/profile" class="uk-button uk-button-success-outline uk-button-large">Atgal</a>
                    </form>
                    <div class="uk-container-small uk-container-expand-right uk-align-right ">

                        <form action="/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <div>
                                <button class="uk-button-large uk-button-secondary"type="submit">Pašalinti anketą</button>
                            </div>
                        </form>
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


