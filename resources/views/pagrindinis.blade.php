{{--@extends('layouts.app')--}}
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

body{
    font-family:Verdana,sans-serif;
    font-size:15px;
    line-height:1.5;
    background-color: rgb(233, 226, 233);
    margin-left: 160px; /* Same as the width of the sidenav */
    padding: 0px 10px;
}

h1{font-size:36px; color:rgb(102, 0, 102)}
h2{font-size:30px;color: white}
h3{font-size:30px;color: rgb(168, 138, 166);}
h4{font-size:20px; color:rgb(102, 0, 102); font-family: cursive; letter-spacing: 3px;  text-transform: uppercase;}
h5{font-size:22px;color: white}
h6{font-size:16px;color: white}

a:link {
    color:#FFE0FF;
}

container{position:relative; hover: span;}
.padding-top{padding:4px 10px!important}
.padding-16{padding-top:16px!important;padding-bottom:16px!important}

.themeblack {color:#fff !important;
    background-color: white!important;
    border-radius: 5%;
}
.theme-light {color:white !important;
    background-color:rgb(168, 138, 166) !important;
    border-radius: 5%;}
.center{text-align:center!important}
.topnav {
    overflow: hidden;
    text-align: right;
}
.button {
    background-color: rgb(102, 0, 102);
    border-radius:50%;
    color: white;
    padding: 5px 40px;
    text-align: center;
    text-decoration: none;
    display: inline;
    font-size: 22px;
    margin: 0px 0px;
    cursor: pointer;
}


margin-top{margin-top:16px!important;
align-content: center}
/**violetinis konteineris po juodo headerio**/
.card{
    box-shadow:0 2px 5px 0 black,0 2px 50px 0 black;
background-color:rgb(102, 0, 102);
border-radius: 5%}
/** vietų parinkimas jame
.half{width:49.99999%}
row-padding>half
.third{width:33.33333%}
row-padding>third
.twothird{width:66.66666%}
row-padding>twothird
**/


.margin-bottom{margin-bottom:16px!important; align-content: center}
.text-theme {color:#000000 !important}
/**footerio**/
padding-16{padding-top:16px!important;padding-bottom:16px!important}
.container{position:relative;}
p {
    font-family: verdana;
    font-size: 18px;
    color: white;
}

.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(168, 138, 166);
    overflow-x: hidden;
    padding-top: 20px;
    border-radius: 5%;
    box-shadow:0 2px 5px 0 black,0 2px 50px 0 black;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: rgb(102, 0, 102);
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.footer {

    text-align: center;
    position: relative;
    bottom: 0;
    width: 100%;
    clear: both;
    overflow: auto;
}

</style>
</html>
<header class="container card themeblack padding-top" id="myHeader">
    <nav class="topnav" >
            @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                        <a class="button " href="{{ url('/home') }}">Pagrindinis</a>

                    @else
                         <a class="button"  href="{{ route('login') }}">Prisijungti</a>
                        @if (Route::has('register'))
                            <a class="button" id="button" href="{{ route('register') }}"><span>Registruotis</span></a>
                        @endif

                    @endauth
                </div>
            @endif

    </nav>

    <div class="center">
        <h4>LAISVAI SAMDOMŲ SPECIALISTŲ SISTEMA</h4>
        <img src="/img/lsss.png" alt="Submit" style="width: 20%;" >
        <div class="padding-32">
            <h4>Ieškokite reikiamų paslaugų!</H4>
            <h4>Įkelkite savo paslaugas ir siūlykite jas kitiems!</H4>
        </div>
    </div>
</header>
<div class="sidenav">
    <a href="/offers">Paslaugos</a>
    <a href="#services">Projektai</a>
    <a href="#clients">Specialistai</a>
    <a href="#contact">Kontaktai</a>
</div>
<div class="center">
    <div class="third">
        <div class="card container" style="min-height:100px">
            <i class="margin-bottom text-theme" style="font-size:120px"></i>
            <h2> <br> Čia galite rasti paslaugas, atitinkančias šias kategorijas:</h2>

        </div>
    </div>

<div class="row-cols-4">
    <div class="theme-light">
        <br>
        @foreach(App\Models\Categories::all() as $type)
            <option {{ old('category')==$type->id ? 'selected' : '' }} value="{{$type->id}}">{{$type->name}}</option>
        @endforeach
    </div>
</div>
{{--    <div class="third">--}}
{{--        <div class="card container" style="min-height:200px">--}}
{{--            <h3>Projektai</h3><br>--}}
{{--            <i class="margin-bottom text-theme" style="font-size:120px"></i>--}}
{{--            <p>Peržiūrėkite JUMS siūlomus projektus!</p>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="third">--}}
{{--        <div class="card container" style="min-height:200px">--}}
{{--            <h3>Specialistai</h3><br>--}}
{{--            <i class="margin-bottom text-theme" style="font-size:120px"></i>--}}
{{--            <p>Peržiūrėkite laisvai samdomų specialistų profilius ir jų teikiamas paslaugas!</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="third">--}}
{{--        <div class="card container" style="min-height:200px">--}}
{{--            <h3>Tapkite laisvai samdomu specialistu</h3><br>--}}
{{--            <i class="margin-bottom text-theme" style="font-size:120px"></i>--}}
{{--            <p>Įkelkite savo teikiamas paslaugas ir būkite matomas!</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<br>

<!-- Footer -->
<footer id="footer"class="footer theme-light center padding-16 ">
    <h1>   LSSS - Laisvai samdomų specialistų sistema - 2021.</h1>
    <h3><a href="mailto:karrad@ktu.edu">Karolina Radzevičiūtė</a></h3>
</footer>
</div>


