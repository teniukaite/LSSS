@extends('layouts.admin_navbar')
@section('content')
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>

    <div class="container">

        <!-- Section:Biography -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-block text-xs-left">
                    <h2 class="card-title" style="color:#009688"><i class="fa fa-book fa-fw"></i>{{$conflict->name}}</h2>
                    <div style="height: 15px"></div>
                    <p>{{$conflict->applicantInfo}}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-block">
                    <h2 class="card-title"  style="color:#009688"><i class="fa fa-user fa-fw"></i>Susiję asmenys</h2>
                    <ul class="list-group" style="margin-top:15px;margin-bottom:15px;">
                        @foreach($users as $user)
                            @if($user->id === $conflict->applicantId)
                                <li class="list-group-item">Skundą pateikė: {{$user->name.' ' .$user->surname}} </li>
                            @endif
                        @endforeach
                            @foreach($users as $user)
                                @if($user->id === $conflict->accusedId)
                                    <li class="list-group-item">Kaltinamasis: {{$user->name.' ' .$user->surname}} </li>
                                @endif
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-block">
                    <h2 class="card-title" style="color:#009688"><i class="fa fa-database fa-fw"></i>Susijusi informacija</h2>
                    <div style="height: 15px"></div>
                    <table class="table table-bordered">
                        <thead class="thead-default">
                        <tr>
                            <th>Kas pateikė</th>
                            <th>Informacija</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn btn-info btn-lg" popup-open="popup-1" href="javascript:void(0)">
                <span class="glyphicon glyphicon-star"></span> Papildoma informacija
            </a>
            <a class="btn btn-success btn-lg" popup-open="popup-11" href="javascript:void(0)">
                <span class="glyphicon glyphicon-star"></span> Priimti sprendimą
            </a>
        </div>
    </div>
    <form action="/admin/user/{{$user['id']}}/bonus" method="POST">
        @csrf
        @method('POST')

        <div class="popup" popup-name="popup-1">
            <div class="popup-content">
                <div class="container">
                    <h2>Papildoma informacija </h2>
                    <label for="standard-select">Naudotojas</label>
                    <div class="select">
                        <select>
                            <option value="Default">Pasirinkite naudotoją, kuris turi pateikti informaciją</option>
                            <option value="1">Greta Teniukaitė</option>
                            <option value="2">Viltė Gucaitytė</option>
                        </select>
                        <span class="focus"></span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 30px">
                        <a class="btn btn-success" popup-close="popup-1" href="javascript:void(0)">Patvirtinti</a>
                        <a class="btn btn-danger" popup-close="popup-1" href="javascript:void(0)">Atšaukti</a>
                    </div>
                    <a class="close-button" popup-close="popup-1" href="javascript:void(0)">x</a>
                </div>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(function() {
            // Open Popup
            $('[popup-open]').on('click', function() {
                var popup_name = $(this).attr('popup-open');
                $('[popup-name="' + popup_name + '"]').fadeIn(300);
            });

            // Close Popup
            $('[popup-close]').on('click', function() {
                var popup_name = $(this).attr('popup-close');
                $('[popup-name="' + popup_name + '"]').fadeOut(300);
            });

            // Close Popup When Click Outside
            $('.popup').on('click', function() {
                var popup_name = $(this).find('[popup-close]').attr('popup-close');
                $('[popup-name="' + popup_name + '"]').fadeOut(300);
            }).children().click(function() {
                return false;
            });
        });
    </script>
@endsection
