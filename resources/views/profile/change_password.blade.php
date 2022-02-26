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
                    <div class="card-header"><strong>Slaptažodžio keitimas</strong></div>
                    <div class="card-body ">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                         @if (session('success'))
                          <div class="alert alert-success">
                               {{ session('success') }}
                         </div>
                            @endif
                <form  method="POST" action="{{ route('changePassword') }}">
                    @csrf


                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password" style="width: 250px;margin-right: 0px">Dabartinis slaptažodis:</label>


                            <input id="current-password" type="password" class="form-control" name="current-password" style="width: 500px" required>

                            @if ($errors->has('current-password'))
                            <br> <br><span class="alert alert-danger">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                            @endif

                    </div>

                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="control-label" style="width: 250px;margin-right: 0px">Naujas slaptažodis:</label>


                            <input id="new-password" type="password" class="form-control" name="new-password" style="width: 500px" required>

                            @if ($errors->has('new-password'))
                               <br> <br><span class="alert alert-danger">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                            @endif

                    </div>

                    <div class="uk-form-group">
                        <label for="new-password-confirm" class="control-label" style="width: 250px;margin-right: 0px">Patvirtinkite slaptažodį:</label>


                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" style="width: 500px" required>

                    </div>

                    <div class="form-group" style="margin-top: 30px">

                            <button type="submit" class="button button-primary button-large">
                                Keisti slaptažodį
                            </button>

                    </div>
                </form>
            </div>
            <a href="/profile/edit" class="button button-secondary button-large">Atgal</a>
        </div>
    </div>
</div>
@endsection
@section('footer')
@endsection




