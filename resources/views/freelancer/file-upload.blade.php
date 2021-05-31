

@extends('layouts.app')

@section('content')
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
                    <label class="custom-file-label" lang="lt" for="chooseFile" >Pasirinkite failą</label>
                </div>
                <br>
                <br>
                <br>
                <div class="uk-container uk-container-small uk-text-center">
                    <h4>Informacija.</h4>
                    <i>Įkelkite vieną savo teikiamos paslaugos nuotrauką. Vėliau galėsite pridėti daugiau pavyzdžių arba juos pašalinti.</i>
                </div>
                <br>
                <button class="button button-primary button-large" type="submit" href="/freelancer/file-upload">Įkelti</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('footer')
@endsection
