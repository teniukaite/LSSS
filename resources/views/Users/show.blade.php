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
        style="background-image: url(img/logomain.png);">
    <div class="uk-overlay uk-position-cover uk-overlay-video"></div>
    <nav class="uk-navbar-container uk-letter-spacing-small uk-text-bold">
        <div class="uk-container uk-container-large">
            <div class="uk-position-z-index" data-uk-navbar>
                <div class="uk-navbar">
                    <a class="uk-navbar-item uk-logo" href="/home">Namų puslapis</a> &emsp;&emsp;

                </div>
                <div class="uk-navbar-center">
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="uk-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="uk-card">
                <div class="uk-card-header"><strong>Šiuo metu jūsų užsakytos paslaugos</strong></div>

                <div class="uk-card-body">

                    <table class="uk-table uk-table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Peržiūrėti</th>
                            <th>Redaguoti</th>
                            <th>Šalinti</th>
                        </tr>
                        @foreach($allOffers as $offer)
                            <tr>
                                <td><strong>{{ $offer->id }}</strong></td>
                                <td><a href="/orders/{{ $offer->id }}" class="btn btn-success text-white">Peržiūrėti</a></td>
                                <td><a href="/orders/{{ $offer->id }}/edit" class="btn btn-primary text-white">Redaguoti</a></td>
                                <td>
                                    {{--                                    <form action="{{ route('orders.destroy', $offer->id) }}" method="POST">--}}
                                    {{--                                        @csrf--}}
                                    {{--                                        @method('DELETE')--}}
                                    {{--                                        <button type="submit" class="btn btn-danger text-white">Šalinti</button>--}}
                                    {{--                                    </form>--}}
                                </td>


                            </tr>
                        @endforeach
                    </table>

                    <br>

                    <a href="/orders/order-history" class="btn btn-primary text-white mb-2">Peržiūrėti užsakymų istoriją</a>
                    <br>
                    <a href="/orders/payment-history" class="btn btn-primary text-white">Peržiūrėti apmokėjimų istoriją</a>
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
