@extends('layouts.admin_navbar')
@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row"style="width: 1800px">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="{{$user['photo']}}" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4>
                                {{ $user['name'] }} {{ $user['surname'] }}</h4>
                                <i class="glyphicon glyphicon-phone">
                                    </i>{{$user['phoneNumber']}}
                            <p>
                                <i class="glyphicon glyphicon-envelope"></i>{{$user['email']}}
                                <br />
                                <i class="glyphicon glyphicon-plus"></i>{{$user['points']}} taškai
                                <br />
                                <i class="glyphicon glyphicon-gift"></i>{{$user['year_of_birth']}}
                                <br />
                                <i class="glyphicon glyphicon-user"></i>{{$user['gender']}}
                            </p>
                            <div class="buttons">
                                <div class="action_btn" style="display: inline-flex">
                                    <a class="btn btn-info btn-lg" popup-open="popup-1" href="javascript:void(0)">
                                       <span class="glyphicon glyphicon-star"></span> Skirti bonusus
                                    </a>
                                    <a class="btn btn-danger btn-lg" popup-open="popup-11" href="javascript:void(0)">
                                        <span class="glyphicon glyphicon-remove"></span> Skirti nuobaudą
                                    </a>
                                    <a href="#" class="btn btn-danger btn-lg" popup-open="popup-111" href="javascript:void(0)">
                                        <span class="glyphicon glyphicon-trash"></span> Ištrinti profilį
                                    </a>
                                </div>
                            </div>
                            <form action="/admin/user/{{$user['id']}}/bonus" method="POST">
                                @csrf
                                @method('POST')

                                <div class="popup" popup-name="popup-1">
                                    <div class="popup-content">
                                        <div class="container">
                                            <h2>Bonusai </h2>
                                            <label for="standard-select">Taškų skaičius:</label>
                                            <div class="select">
                                                <select>
                                                    <option value="Default">Pasirinkite taškų skaičių</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                                <span class="focus"></span>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 30px">
                                                <button type="submit" class="btn btn-success">Patvirtinti</button>
                                                <a class="btn btn-danger" popup-close="popup-1" href="javascript:void(0)">Atšaukti</a>
                                            </div>
                                            <a class="close-button" popup-close="popup-1" href="javascript:void(0)">x</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="popup" popup-name="popup-11">
                                    <div class="popup-content">
                                        <div class="container">
                                            <h2>Nuobaudos </h2>
                                            <label for="standard-select">Taškų skaičius:</label>
                                            <div class="select">
                                                <select>
                                                    <option value="Default">Pasirinkite taškų skaičių</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                                <span class="focus"></span>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 30px">
                                                <button type="submit" class="btn btn-success">Patvirtinti</button>
                                                <a class="btn btn-danger" popup-close="popup-11" href="javascript:void(0)">Atšaukti</a>
                                            </div>
                                            <a class="close-button" popup-close="popup-11" href="javascript:void(0)">x</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="popup" popup-name="popup-111">
                                    <div class="popup-content">
                                        <div class="container">
                                            <h2>Ar tikrai norite pašalinti šį profilį? </h2>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 30px">
                                                <button type="submit" class="btn btn-success">Patvirtinti</button>
                                                <a class="btn btn-danger" popup-close="popup-111" href="javascript:void(0)">Atšaukti</a>
                                            </div>
                                            <a class="close-button" popup-close="popup-111" href="javascript:void(0)">x</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

        .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

        small {
            display: block;
            line-height: 1.428571429;
            color: #999;
        }
    </style>
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
