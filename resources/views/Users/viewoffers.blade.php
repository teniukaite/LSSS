  @extends('layouts.app')

@section('style')
    <style>
        .card-img-top {
            width: 100%;
            height: 30vh;
            object-fit: cover;
        }

    </style>
@endsection

@section('content')

        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Paslaugų pasiūlymai</h2></div>
                    <h4 style="color: rgb(96, 32, 64);margin-top: 30px"><b>RASKITE PASLAUGĄ PAGAL RAKTINĮ ŽODĮ:</b></h4>
                  <div class="col-md-12" style=" margin-bottom: 30px; margin-top: 30px" >
                     <form  type="get" action="{{url('/search')}}">
                      <input  class="form-control" name="query" type="search"  style="margin-bottom: 5px; width: 550px!important;"  placeholder="Įveskite paslaugos, kurios ieškote raktinį žodį" aria-label="Įveskite paslaugos, kurios ieškote raktinį žodį">
                         <button class="btn btn-search text-white" style="height: 40px; width: 50px;" > <i class="material-icons" style="width: 10px; height: 10px">search </i></button>
                     </form>
                  </div>
                    <h4 style="color: rgb(96, 32, 64);margin-top: 0px; margin-bottom: 20px"><b>ARBA</b></h4>
                    <br>
                    <h4 style="color: rgb(96, 32, 64);margin-bottom: 30px"><b>RASKITE PASLAUGĄ PAGAL KAINĄ:</b></h4>
                    <form method="POST" action="{{ route('filter') }}" class="mb-2">
                        @csrf
                        <div class="form-row" display="flexbox">
                            <div class="form-group col-md-12">
                                <label style="width: 125px" for="priceFrom">KAINA NUO:</label>
                                <input style="width: 200px" name="priceFrom" type="number"  class="form-control {{ $errors->has('priceFrom') ? 'is-invalid' : '' }}" id="priceFrom" placeholder="NUO">
                                <label style="width: 120px"  for="priceTo">KAINA IKI:</label>
                                <input name="priceTo" type="number"  style=" width: 200px" class="form-control {{ $errors->has('priceTo') ? 'is-invalid' : '' }}" id="priceTo" placeholder="IKI">
                            </div>
                        </div>

                        <input style="margin-left: 20px" type="submit" class="button button-primary button-large" value="Filtruoti" />
                        <a href="/offers" class="button button-secondary text-white">Pašalinti filtrus</a>

                        @if ($errors->has('priceFrom'))
                            <div class="alert alert-danger" role="alert">{{ $errors->first('priceFrom') }}</div>
                        @endif
                        @if ($errors->has('priceTo'))
                            <div class="alert alert-danger" role="alert">{{ $errors->first('priceTo') }}</div>
                        @endif
                    </form>

                    @if (session('statusDanger'))
                        <div class="alert alert-danger">
                            {{ session('statusDanger') }}
                        </div>
                    @endif

                    <br>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                        @if(session('danger'))
                            <div class="alert alert-danger">
                                {{session('danger')}}
                            </div>
                        @endif
                    @forelse($allOffers->chunk(3) as $offerChunk)
                            <div class="row hidden-md-up mb-1" >
                                @foreach ($offerChunk as $offer)
                                 <div class="col-md-4">
                                    <div class="card m-1"style="height: 500px">
                                        <img style="max-height: 200px" src="{{ Storage::url($offer->file_path) }}"
                                             onerror="this.onerror=null; this.src='https://bulma.io/images/placeholders/1280x960.png'" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h3 class="card-title"><b>{{$offer->service_name}}</b></h3>
                                        <p class="card-text">
                                        Kaina: {{$offer->price}}<br>
                                        Miestas: {{ ucfirst($offer->city)}}
                                    </div>
                                <div class="card-footer text-center">
                                    <a href="/offers/{{ $offer->id }}" class="button button-secondary btn-block ">Peržiūrėti</a>
                                    @auth
                                    <form method="POST" action="/comparison">
                                        @method('POST')
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $offer->id }}" name="id" />
                                        </div>
                                        <button  type="submit"  class="button button-primary " style="font-size: 19px">Įtraukti į palyginimą</button>
                                    </form>
                                    @endauth
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
            @empty
                        <div class="alert alert-danger">
                            Šiuo metu neturime pasiūlymų, atitinkančių Jūsų paiešką  <i class="material-icons" style="width: 200px">priority_high</i>
                        </div>
            @endforelse
                <div class="text-center" style="margin: 1em 0em;">
                    {{$allOffers->links()}}
                </div>
                </div>
            </div>
        </div>
</div>

        </div>

@endsection
@section('footer')
@endsection
