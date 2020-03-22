@extends('layouts.public')

@section('content')


  <main>
    <div class="container">
        @if (session('message'))
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif
      <div class="row">
        <div class="card mb-3">
          <img class="card-img-top" src="{{asset('storage/'.$apartment->cover_image)}}" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">{{$apartment->title}}</h3>
            <p class="card-text descrizione">{{$apartment->descrizione_appartamento}}</p>
            <p class="indirizzo"><img class="indirizzo-img" src="https://image.flaticon.com/icons/svg/967/967848.svg" alt="">{{$apartment->indirizzo}},{{$apartment->city}}</p>
            <div id="map" style="width: 100%; height: 250px; margin-bottom: 3rem;">

            </div>
            <div class="row">
                <div class="col-sm-6">


                    <h6 class="card-text dettagli">Dettagli</h6>
                    <ul>
                        <li><img src="https://image.flaticon.com/icons/svg/515/515159.svg" alt=""> Metri quadri: {{$apartment->metri_quadri}}</li>
                        <li><img src="https://image.flaticon.com/icons/svg/515/515123.svg" alt=""> Stanze: {{$apartment->stanze}}</li>
                        <li><img src="https://image.flaticon.com/icons/svg/1530/1530735.svg" alt=""> Posti letto: {{$apartment->posti_letto}}</li>
                        <li><img src="https://image.flaticon.com/icons/svg/1606/1606180.svg" alt=""> Bagni: {{$apartment->bagni}}</li>
                    </ul>
                    <h6 class="card-text dettagli">Servizi</h6>

                    <ul>
                        @if ($apartment->services->isEmpty())
                            <li>Non ci sono servizi</li>
                        @else
                            @foreach ($apartment->services as $service)

                                @if ($service->service_name == 'Piscina')
                                    <li><img src="https://image.flaticon.com/icons/svg/495/495815.svg" alt=""> {{$service->service_name}}</li>
                                @endif

                                @if ($service->service_name == 'Posto macchina')
                                    <li><img src="https://image.flaticon.com/icons/svg/2439/2439889.svg" alt=""> {{$service->service_name}}</li>
                                @endif

                                @if ($service->service_name == 'WiFi')
                                    <li><img src="https://image.flaticon.com/icons/svg/263/263114.svg" alt=""> {{$service->service_name}}</li>
                                @endif

                                @if ($service->service_name == 'Sauna')
                                    <li><img src="https://image.flaticon.com/icons/svg/1858/1858158.svg" alt=""> {{$service->service_name}}</li>
                                @endif

                                @if ($service->service_name == 'Portineria')
                                    <li><img src="https://image.flaticon.com/icons/svg/1720/1720008.svg" alt=""> {{$service->service_name}}</li>
                                @endif

                                @if ($service->service_name == 'Vista mare')
                                    <li><img src="https://image.flaticon.com/icons/svg/430/430470.svg" alt=""> {{$service->service_name}}</li>
                                @endif



                            @endforeach

                        @endif

                    </ul>
                </div>
                <div class="col-sm-6">
                    <h4>Contatta il proprietario</h4>
                    <form class="" action="{{route('messaggio',['apartment'=>$apartment->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Indirizzo Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                            @guest
                                {{-- se il visitatore non è autenticato, deve inserire l'email --}}
                                value=""
                            @endguest
                            @auth
                                {{-- altrimenti riempe il campo con la mail già registrata --}}
                                value="{{Auth::user()->email}}"
                            @endauth
                            name="email" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Messaggio</label>
                            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="8"></textarea>
                        </div>
                        <button class="btn btn-success" type="submit" name="button">Invia</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
        <input id="lat" type="text" name="" value="{{ $coordinate->lat}}" hidden>
        <input id="lon" type="text" name="" value="{{ $coordinate->lon}}" hidden>
      </div>
    </div>
  </main>
@endsection
