<!DOCTYPE html>
<html lang="en-gb" dir="ltr">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LSSS</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&amp;display=swap" rel="stylesheet">
    {{--    <link href="css/main.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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
        <div class="container mt-5">
            <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
                <h1 class="text-center mb-5 ">Įkelkite savo darbo pavyzdį!</h1>
                @csrf
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="chooseFile">
                    <label class="custom-file-label" for="chooseFile" >Pasirinkite failą</label>
                    {{--            data-browse="Pasirinkti"--}}
                </div>
                <br>
                <br>
                <div class="uk-container uk-container-small uk-text-center">
                    <h4>Informacija!</h4>
                    <h3>Įkelkite vieną savo teikiamos paslaugos nuotrauką. Vėliau galėsite pridėti daugiau pavyzdžių bei juos redaguoti.</h3>
                </div>
                <br>
                {{--        <input type="image" alt="Submit" src="/img/IKELTI.jpg" width="150" height="130" align="right" >--}}
                <button class="uk-button uk-button-primary uk-button-large" type="submit" href="/freelancer/file-upload">Įkelti</button>



                {{--        <input type="image" align="right" src="/img/baigti1.jpg" alt="Submit"  width="200" height="150" href="/profile/index">--}}

                {{--        <img src='{{ asset('storage/upload/'.$file_path) }}'id="Image" name="Image" />--}}
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
    </div>
</footer>
</body>
</html>
