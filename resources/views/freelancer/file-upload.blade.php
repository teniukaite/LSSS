@extends('layouts.app')
@section('content')

<body>

<div class="container mt-5">
    <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
        <h1 class="text-center mb-5 themeblack">Įkelkite savo darbo pavyzdį!</h1>
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
            <label class="custom-file-label" for="chooseFile" >Pasirinkite failą</label>
{{--            data-browse="Pasirinkti"--}}
        </div>
        <br>
        <br>
        <div class="alert alert-info center">
            <h4>Informacija!</h4>
            <h3>Įkelkite vieną savo teikiamos paslaugos nuotrauką. Vėliau galėsite pridėti daugiau pavyzdžių bei juos redaguoti.</h3>
        </div>
        <br>
{{--        <input type="image" alt="Submit" src="/img/IKELTI.jpg" width="150" height="130" align="right" >--}}
        <button class="button" type="submit" href="/freelancer/file-upload">Įkelti</button>



{{--        <input type="image" align="right" src="/img/baigti1.jpg" alt="Submit"  width="200" height="150" href="/profile/index">--}}

{{--        <img src='{{ asset('storage/upload/'.$file_path) }}'id="Image" name="Image" />--}}
    </form>
</div>

</body>
</html>
@endsection
