@extends('layouts.app')
@section('style')
    <style>
/* contact section */
#contact {
background: #f9f9f9;
text-align: center;
}
#contact .fa {
font-size: 40px;
}
#contact form {
padding-top: 80px;
}
#contact .form-control {
border-radius: 0;
box-shadow: none;
margin-top: 10px;
margin-bottom: 10px;
/*transition: all 0.4s ease-in-out;*/
}
#contact .form-control:focus {
border: 2px solid #808080;
}
#contact input {
height: 50px;
}
#contact input[type="submit"] {
border: 2px solid #808080;
margin-top: 18px;
height: 54px;
}
#contact input[type="submit"]:hover {
background: #808080;
color: #ffffff;
}
#contact textarea {
height: 170px;
}
#contact {
        padding-top: 100px;
        padding-bottom: 100px;
    }
.contact-info-box h3 { font-size: 16px; }
            @media screen and (min-width: 992px) {
                @-moz-document url-prefix() {
                    #portfolio .col-lg-4,
                    #portfolio .col-md-4 {
                        width: 33.333%;
                    }
                }
            }

            @media ( max-width: 980px ) {
                .custom-navbar .navbar-brand {
                    font-size: 24px;
                }
                #about img {
                    padding-top: 40px;
                }
                #contact form {
                    padding-top: 30px;
                }
            }

            @media screen and (max-width: 767px) {
                .contact-info-box { margin-bottom: 20px; }
                .contact-info-box:last-child { margin-bottom: 0; }
            }

            @media (max-width: 450px) {
                .heading {
                    font-size: 40px;
                }
                #about .col-md-4 .fa {
                    margin-top: 32px;
                }
                #contact h3 {
                    font-size: 16px;
                    padding-bottom: 40px;
                }
            }

</style>
@endsection

@section('content')
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <div class="card-body">
            <section id="contact">
                <div class="container" style="border-right: 3px solid #7a1f5c; border-left:  3px solid #7a1f5c">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <img src="img/LSSSbenduomene.png" style="padding-bottom: 20px; width: 40%;  border-radius: 5%;">
                            <h1 style="color: rgb(204, 0, 153); padding-bottom: 20px"><B>LAISVAI SAMDOMŲ SPECIALISTŲ BENDRUOMENĖ</B></h1>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
                            <h3 style="color: #28273f; text-transform: uppercase;">Seniai svajojate būti nepriklausomas nuo darbo vietos?</h3>
                            <img style="width: 300px" src="img/workation.jpg">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
                            <h3 style="color: #28273f; text-transform: uppercase;">Norisi lankstesnių darbo valandų?</h3>
                            <img style="width: 300px" src="img/hours.jpg">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" >
                            <h3 style="color:#28273f; text-transform: uppercase;">Norite gauti visą atlygį už savo atliktą darbą?</h3>
                            <img style="width: 280px" src="img/money.jpg">
                        </div>
                        <div class="col-md-12 col-sm-12 text-center">
                            <h3 style="color: #28273f; text-transform: uppercase; padding-top: 20px">Dažnai apie tai pagalvojate, tačiau nežinote kaip to pasiekti?</h3>
                            <h1 style="color: rgb(204, 0, 153); text-transform: uppercase;"><b>Mes turime JUMS sprendimą!</b></h1>
                            <div class="container" style="border-bottom: 5px solid  #28273f;border-top: 5px solid  #28273f">
                                <p style="color: #28273f; text-transform: uppercase;">Registruokis mūsų svetainėje, užpildyk laisvai samdomo specialisto registracijos formą ir tapk laisvai samdomų specialistų bendruomenės dalimi</p>
                                <p style="color: #28273f; text-transform: uppercase;">Tuomet įkelk savo paslaugą, nustatyk galimus registracijai laikus ir lauk užsakymų!</p>
                            </div>
                            <h1  style="color: rgb(204, 0, 153); text-transform: uppercase;"><b>Leisk klientams surasti TAVE!</b></h1>
                        </div>
                        <hr>
                        <div class="col-md-12 col-sm-12 text-center">
                            <p class="heading bold" style="color: #28273f; font-size: 30px">PERŽIŪRĖKITE TEIKIAMAS PASLAUGAS <br> IR <br>UŽSIREGISTRAVUSIUS SPECIALISTUS</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                            <a  class="button button-tertiary button-large" style="margin-bottom: 10px" href="/offers">PASLAUGOS<br><img  style="width: 200px" src="img/allOffers.png"></a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
                            <a class="button button-tertiary button-large" href="/freelancer/freelancerslist">SPECIALISTAI<br><img  style="width: 200px" src="img/specialists.png"></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection
