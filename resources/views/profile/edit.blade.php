@extends('layouts.app')
@section('style')
    <style>
        .half {
            white-space:nowrap;
        }
        .half img {
            display:inline;
        }
        .half figcaption {
            display:block
        }
    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Profilio redagavimas</strong></div>
                    <div class="card-body ">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    <form method="POST" action="/profile" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <img name="photo" class="border-circle" style="max-width: 200px; border-radius: 20%; margin-bottom: 20px; margin-top: 20px" alt="{{ $user->name }}" src="{{ $user->photo }}"/>
                        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                        <script type='text/javascript'>
                            $(function(){
                                // wrapper - elementas, kuris apgaubia visa kita. T.y. visa failo ikelima<div>
                                var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
                                var fileInput = $(':file').wrap(wrapper);

                                // Kai įkeliamas failas,tuomet mygtuke pasikeičia pavadinimas, kuriame nurodytas failo vardas
                                fileInput.change(function(){
                                    $this = $(this);
                                    // Jei pasirinkimas  tuščias, perkrauti
                                    if($this.val().length == 0) {
                                        $('#file').text("Pasirinkite failą!");
                                    }else{
                                        $('#file').text($this.val());
                                    }
                                })

                                // Kai netikras mygtukas paspaudziamas, simuliuojamas paspaudimas
                                $('#file').click(function(){
                                    fileInput.click();
                                }).show();
                            });
                        </script>
                        <button  class="btn btn-file-upload" id="file">Keiskite profilio nuotrauką
                            <i class="material-icons"> &nbsp add_photo_alternate</i></button>
                        <!-- Your File element -->
                        <input type="file" name="file" />
                        <label for="name" class="form-label"style="width: 200px;margin-right: 0px">Jūsų vardas:  </label>

                        <input id="name" type="text" class="input form-large" name="name" style="width: 500px" value="{{ $user->name }}" required><br>

                        <label for="surname" class="form-label" style="width: 200px;">Jūsų pavardė:</label>
                        <input type="text" name="surname" class="input form-large" style="width: 500px;" value="{{ $user->surname }}"required><br>

                        <label for="email" class="form-label"style="width: 200px">El. paštas:</label>
                        <input type="email" name="email" class="input form-large" style="width: 500px;"  value="{{ $user->email }}"required><br>

                        <label for="phoneNumber" class="uk-form-labell" style="width: 200px">Telefono numeris:</label>
                        <input type="text" name="phoneNumber" class="input form-large" style="width: 500px;"  value="{{ $user->phoneNumber }}"required><br>

                        @if($user->type == 1)

                            @foreach($freelancers as $freelancer)
                                <h1>  {{$freelancer->freelancderID}}</h1>
                                @if($user->id == $freelancer->freelancerID)
                                    <div class="uk-width-1-2">
                                        <label for="education" class="form-label"style="width: 200px;margin-right: 0px">Išsilavinimas:  </label>
                                        <input id="education" type="text" class="input form-large" name="education" style="width: 500px" value="{{ $freelancer->education}}" required><br>

                                        <label for="description" class="form-label"style="width: 200px; height:auto;margin-right: 0px">Aprašymas:  </label>
                                        <textarea id="description" type="text"  rows="4" cols="50" name="description" required>{{ $freelancer->description}}</textarea><br>
                                        <input  id="freelancerID" type="hidden" name="freelancerID" value="{{ $freelancer->freelancerID }}">
                                @endif
                            @endforeach
                        @endif
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <hr style="color: rgb(204, 51, 153); border-bottom: 3px solid rgb(204, 51, 153)">
                        <button type="submit" class="button button-primary button-large">Išsaugoti</button>
                        <a href="/profile/change_password" class="button button-secondary button-large">Keisti slaptažodį</a>
                        <a href="/profile" class="button button-tertiary button-large">Atgal</a>
                    </div>
                    </form>
                            <hr style="color: rgb(204, 51, 153); border-bottom: 3px solid rgb(204, 51, 153)">
                    <div class="container-small container-expand-right align-right ">

                        <form action="/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <div>
                                <button class="btn btn-danger"type="submit">Pašalinti anketą</button>
                            </div>
                        </form>
                    </div>
            </div>
         </div>
</div>
@endsection
@section('footer')
@endsection


