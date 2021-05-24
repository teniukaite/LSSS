@extends('layouts.app')
@section('style.css')
    <style>

    </style>

@endsection
@section('content')

{{--    <div class="container">--}}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Aprašykite ir įkelkite savo paslaugą!</div>
                    <div class="card-body">
                        <form action="{{config('app.url')}}/offers" method="post"  enctype="multipart/form-data" >

                            @method('POST')
                            @csrf

                            <div class="form-input" style=" margin-bottom: 30px; margin-top: 30px;">
                                <label><i class="material-icons"> drive_file_rename_outline  &nbsp</i>PAVADINIMAS:</label><br>
                                <input type="text" name="service_name"
                                        class="form-control {{ $errors->has('service_name') ? 'is-invalid' : '' }}"
                                        placeholder="Įveskite pavadinimą:" value="{{ old('service_name') }}" >
                            </div>

                            <div  class="form-group">
                            <label> <i class="material-icons"> description  &nbsp</i>APRAŠYMAS:</label><br>
                                <textarea  name="description" rows="4" cols="50"
                                            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                             placeholder="Aprašykite savo teikiamas paslaugas:" value="{{ old('description') }}">
                                </textarea>
                                <br>
                            </div >
                            <div class="form-group">
                                <label>  <i class="material-icons"> timer  &nbsp</i>TRUKMĖ:</label><br>
                                <input  style="width: 40%" placeholder="Įveskite paslaugos trukmę" class="form-control" type="number" step="0.01"  min="0" name="duration" required="required">VAL.

                            </div>
                            <div class="form-group">
                            <label>  <i class="material-icons"> euro  &nbsp</i>KAINA:</label><br>
                                <input  placeholder="Įveskite kainą" class="form-control" type="number" step="0.01"  min="1" name="price" required="required">

                            </div>

                            <div class="form-group">
                                <select name="price_content"  required="required">
                                    <option>EUR/VAL</option>
                                    <option>UŽ ATLIKTĄ DARBĄ</option>
                                </select>
                            </div>
                        <br>

                        <label  for="$category" > <p>  <i class="material-icons"> category  &nbsp</i>KATEGORIJA:</p></label><br>
                        <select style=" margin-bottom: 30px; margin-top: 0px"required="required" class="form-control {{ $errors->has('categories') ? 'is-invalid' : '' }}"  name="category">
                            <option class="select" style="font-size: 20px" value="">Nustatykite paslaugos kategoriją:</option>
                            @foreach(App\Models\Categories::all() as $type)
                                <option  style="font-size: 18px" {{ old('category')==$type->id ? 'selected' : '' }} value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>


                            <div class="form-group" style="justify-content: center">
                            <i class="material-icons"> apartment   &nbsp</i>
                            <label>MIESTAS:</label><br>
                                <input  required="required" class="form-control" type="text" name="city"  placeholder="Įveskite miestą">
                        </div>
                            <br>
                        <h4 class="text-center mb-5" style="margin-top: 20px; margin-bottom: 0px; color: rgb(153, 51, 102);">Įkelkite savo darbo pavyzdį, kuris geriausiai atspindi Jūsų teikiamą paslaugą.</h4>

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
                            <button  class="btn btn-file-upload" id="file">Pasirinkite nuotrauką
                                <i class="material-icons"> &nbsp add_photo_alternate</i></button>
                            <!-- Your File element -->
                            <input type="file" name="file" />
                        <br>
                        <br>
                        <div class="container text-center">
                            <h4 style="color: red">Svarbu!</h4>
                            <h5>Jūsų įkeltą darbo pavyzdį matys klientai.</h5>
                        </div>
                        <br>
                        <button class="btn btn-success inline-block mb-1  text-white" type="submit" style="">Įkelti<i class="material-icons"> &nbsp publish </i></button>

                        </form>
                    </div>
                    </div>
                    </div>

                    </div>
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
