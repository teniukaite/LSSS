<!DOCTYPE html>
<html lang="en-gb" dir="ltr">


<!-- Mirrored from html-theme-curso.vercel.app/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 May 2021 13:14:37 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
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
                <h1 class="uk-letter-spacing-small">Sukurkite savo profilį</h1>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="name">Vardas</label>
                    <input id="name" type="text" placeholder="Vardas"
                           class="uk-input uk-form-large @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="surname">Pavardė</label>
                    <input id="surname" type="text" placeholder="Pavardė"
                           class="uk-input uk-form-large @error('surname') is-invalid @enderror"
                           name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="email">El.paštas</label>
                    <input id="email" type="email" placeholder="vardaspavarde@ktu.edu"
                           class="uk-input uk-form-large @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="password">Slaptažodis</label>
                    <input id="password" type="password" placeholder="Mažiausiai 8 simboliai"
                           class="uk-input uk-form-large @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="password_confirmation">Pakartokite slaptažodį</label>
                    <input id="password_confirmation" type="password" placeholder="Įveskite slaptažodį"
                           class="uk-input uk-form-large"
                           name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="uk-width-1-1 uk-margin">
                    <label class="uk-form-label" for="year_of_birth">Gimimo data</label>
                    <input id="year_of_birth" type="date" placeholder="mmmm-mm-dd"
                           class="uk-input uk-form-large @error('year_of_birth') is-invalid @enderror"
                           name="year_of_birth" required autocomplete="year_of_birth">
                    @error('year_of_birth')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>


                <div class="uk-width-1-1 uk-text-center">
                    <button class="uk-button uk-button-primary uk-button-large">Registruotis</button>
                </div>
            </form>
        </div>
    </div>
    <div class="uk-width-1-2@m uk-padding-large uk-flex uk-flex-middle uk-flex-center uk-light
    uk-background-cover uk-background-norepeat uk-background-blend-overlay uk-background-primary"
         style="background-image: url(img/logodaug.png);" data-uk-height-viewport>
        <div>
            <div class="uk-text-center">
                <h2 class="uk-h1 uk-letter-spacing-small">Jau esate mūsų bendruomenės narys?</h2>
            </div>
            <div class="uk-margin-top uk-margin-medium-bottom uk-text-center">
                <h3>Prisijunkite!</h3>
            </div>
            <div class="uk-width-1-1 uk-text-center">
                <a href="{{ route('login')}}" class="uk-button uk-button-success-outline uk-button-large">Prisijungti</a>
            </div>
        </div>
    </div>
</div>
</div>

</body>


<!-- Mirrored from html-theme-curso.vercel.app/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 May 2021 13:14:37 GMT -->
</html>

