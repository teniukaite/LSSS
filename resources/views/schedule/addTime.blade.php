<!DOCTYPE html>
<html lang="lt" dir="ltr">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LSSS</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <script src="js/uikit.js" ></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>

<header class="uk-cover-container uk-background-cover uk-background-norepeat uk-background-center-center"
        style="background-image: url(img/logo4.png);">
    <div class="uk-overlay uk-position-cover uk-overlay-video"></div>
    <nav class="uk-navbar-container uk-letter-spacing-small uk-text-bold">
        <div class="uk-container uk-container-large">
            <div class="uk-position-z-index" data-uk-navbar>
                <div class="uk-navbar">
                    <a class="uk-navbar-item uk-logo" href="/schedule/index"><h2><b>Tvarkaraštis</b></h2></a>
                </div>
                <div class="uk-navbar-center">

                </div>

            </div>
        </div>
    </nav>
</header>
<div class="uk-container uk-navbar-right uk-margin-bottom uk-width-1-3">
    <h3 style="color: rgb(204, 0, 153); align-items: center"><b>Pridėkite registracijos laiką paslaugai:</b></h3>
</div>
    <div class="uk-width-1-1">

        <div class="uk-container uk-width-1-2 uk-margin-bottom uk-form-horizontal uk-nav-center ">
    <div>
        <div class="uk-card uk-card-large uk-card-border ">
            <div class="uk-position-relative uk-width-1-1">
                <div class="">
                    <div>
                        <div class="uk-card uk-card-large  uk-card-border ">
                            <div class="uk-position-relative uk-light uk-width-1-1">
                                <div class="">
                                    <span class="uk-text-bold uk-text-price uk-text-small"> <h2>{{ $offerId->service_name}}</h2></span>
                                </div>

                                <form method="POST" action="/schedule/index" enctype="multipart/form-data">
                                    @csrf
                                <div class="uk-card uk-child-width-1-2 uk-grid">
                                    <div class="uk-card-body ">
                                                <label class="uk-form-label" for="date" style="color: black">Diena:</label>
                                                <input id="date" type="date" placeholder="metai-mėnesis-diena"
                                                       class="form-control @error('date') is-invalid @enderror"
                                                       name="date" required autocomplete="date">
                                                @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                 </div>

                                            <div>
                                                <br> <br> <br>
                                                    <label class="uk-form-label" for="time" style="color: black">Laikas:</label><br>
                                                    <input id="time" type="time" name="time" style="color: black" class="timepicker uk-form-control uk-select-large @error('time') is-invalid @enderror"
                                                           name="time" required autocomplete="date">
                                                @error('time')
                                                <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <button type="submit" class="uk-button uk-button-primary uk-button-large">Išsaugoti</button>
                                                <a class="uk-button uk-button-primary uk-button-large" href="{{ URL::previous() }}">Atgal</a>
                                            </div>
                                            <input type="hidden" id="id" name="id" value="{{ $offerId->id}}">

                                            <script type="text/javascript">

                                                $('.timepicker').datetimepicker({

                                                    format: 'HH:mm'

                                                });
                                            </script>
                                            </div>
                                          </form>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
