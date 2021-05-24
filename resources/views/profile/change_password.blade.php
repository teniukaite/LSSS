
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
</header>
<div id="about" class="uk-section uk-section-muted uk-section-large">
    <div class="uk-container">

        <div class="uk-width-4-5@m">
            <div class="uk-card-header"><h1>Slaptažodžio keitimas</h1></div>

            <div class="uk-card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="uk-form-horizontal" method="POST" action="{{ route('changePassword') }}">
                    @csrf


                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="uk-col-md-4 control-label">Dabartinis slaptažodis</label>

                        <div class="col-md-6">
                            <input id="current-password" type="password" class="uk-form-control" name="current-password" required>

                            @if ($errors->has('current-password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-4 uk-control-label">Naujas slaptažodis</label>

                        <div class="col-md-6">
                            <input id="new-password" type="password" class="form-control" name="new-password" required>

                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="uk-form-group">
                        <label for="new-password-confirm" class="uk-control-label">Patvirtinkite slaptažodį</label>

                        <div class="col-md-6">
                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="uk-button uk-button-primary uk-button-large">
                                Keisti slaptažodį
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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




