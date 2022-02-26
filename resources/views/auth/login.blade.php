<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" />
    <script src="js/uikit.js"></script>
</head>

<body>

<div class="uk-grid-collapse" data-uk-grid>
    <div class="uk-width-1-2@m uk-padding-large uk-flex uk-flex-middle uk-flex-center" data-uk-height-viewport>
        <div class="uk-width-3-4@s">
            <div class="uk-text-center uk-margin-bottom">
                <a class="uk-button uk-button-success-outline uk-button-large" href="/">LSSS</a>
            </div>
            <div class="uk-text-center uk-margin-medium-bottom">
                <h1 class="uk-letter-spacing-small">Prisijunkite</h1>
            </div>
            <div class="uk-text-center uk-margin">
                <p class="uk-margin-remove">Suveskite prisijungimo duomenis:</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="email">El.paštas</label>
                    <input id="email" type="email" placeholder="vardaspavarde@ktu.edu"
                           class="uk-input uk-form-large @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror



                </div>
                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="password">Slaptažodis</label>
                    <input id="password" type="password" placeholder="Įveskite slaptažodį"
                           class="uk-input uk-form-large @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="uk-width-1-1 uk-margin uk-text-center">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        <a class="uk-text-small uk-link-muted" href="{{ route('password.request') }}">Pamiršote slaptažodį?</a>
                    </a>
                @endif
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                <h7> {{ __('Prisiminti mane') }}</h7>
                            </label>
                        </div>
                    </div>
                </div>

                            <div class="uk-width-1-1 uk-text-center">
                    <button class="uk-button uk-button-primary uk-button-large">Prisijungti</button>
                </div>
            </form>
        </div>
    </div>
    <div class="uk-width-1-2@m uk-padding-large uk-flex uk-flex-middle uk-flex-center uk-light
    uk-background-cover uk-background-norepeat uk-background-blend-overlay uk-background-primary"
         style="background-image: url(img/logodaug.png);" data-uk-height-viewport>
        <div>
            <div class="uk-text-center">
                <h2 class="uk-h1 uk-letter-spacing-small">Dar nesate prisiregistravę sistemoje?</h2>
            </div>
            <div class="uk-margin-top uk-margin-medium-bottom uk-text-center">
                <h3>Užsiregistruokite!</h3>
            </div>
            <div class="uk-width-1-1 uk-text-center">
                <a href="{{ route('register')}}" class="uk-button uk-button-success-outline uk-button-large">Registruotis</a>
            </div>
        </div>
    </div>
</div>

</body>


<!-- Mirrored from html-theme-curso.vercel.app/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 May 2021 13:14:37 GMT -->
</html>
