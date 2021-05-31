@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div>
                <button class=" button button-large button-primary"type="submit" style="margin-bottom: 20px"><a href="/upload-file" >Įkelti daugiau pavyzdžių</a></button>
            </div>
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="card-header">Jūsų darbų pavyzdžiai</div>
                    <div class="card-body">
                        @forelse($allFiles->chunk(2) as $offerChunk)
                            <div class="row hidden-md-up mb-1" >
                             @foreach($offerChunk as $files)
                               @if ($files->freelancerID == Auth::user()->id)
                                  <div class="card-body">
                                   <div class="col-md-1">
                                      <img style="width: 450px;max-height: 400px" src="{{ Storage::url( $files->file_path) }}">
                                       <form action="/files/{{ $files->id }}" method="POST">
                                        @csrf
                                         @method('DELETE')
                                         <div>
                                         <button class="button button-large button-secondary"type="submit" style="width: 250px;height: 35px">Ištrinti
                                          <i style="margin-bottom: auto;margin-top: auto" class="material-icons">&nbsp clear  &nbsp</i></button>
                                         </div>
                                        </form>
                                   </div>
                             </div>
                                @endif
                             @endforeach
                               </div>
                            @empty
                            <div class="alert alert-danger">
                                Šiuo metu neturime pasiūlymų, atitinkančių Jūsų paiešką  <i class="material-icons" style="width: 200px">priority_high</i>
                            </div>
                        @endforelse
                   </div>
               </div>
          </div>
       </div>
@endsection
@section('footer')
@endsection
