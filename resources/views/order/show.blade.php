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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Jūsų užsakymas: <strong>{{ $order->order_id }}</strong></div>

                        <div class="card-body">
{{--                            @foreach($offer as $offer)--}}
{{--                            <p><b>Užsakymo sukūrimo data:</b> {{ $order->price}}</p>--}}

                            <p><b>Paslaugos pavadinimas:</b> {{ $offer->service_name }}</p>
                            <p><b>Kaina:</b> {{ $offer->price }} eur.</p>
                            <p><b>Kategorija:</b> {{ $offer->category}} </p>
                            @foreach($users as $user)
                                @if($offer->freelancerId== $user->id)
                                    <p><b>Atlieka:</b>    <td><strong>{{$user->name}} {{$user->surname}}</strong></td>
                                @endif
                            @endforeach
{{--                            <p><b>Atlieka:</b> {{ $offer->freelancerId}}</p>--}}
{{--                            <p><b>Žmonių kiekis:</b> {{ $offer->people_count }}</p>--}}
{{--                            <p><b>Transporto tipas:</b> {{ $offer->off_transport_type->name }}</p>--}}
{{--                            <p><b>Apgyvendinimo tipas:</b> {{ $offer->off_accommodation_type->name }}</p>--}}
{{--                            <p><b>Maitinimo tipas:</b> {{ $offer->off_catering_type->name }}</p>--}}
{{--                            <p><b>Šalis:</b> {{ $offer->off_country->name }}</p>--}}
{{--                            @endforeach--}}
                            <a class="btn btn-primary" href="{{ URL::previous() }}">Atgal</a>

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
