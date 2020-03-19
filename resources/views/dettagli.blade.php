@extends('layouts.public')

@section('content')


  <main>
    <div class="container">
      <div class="row">
        <div class="card mb-3">
          <img class="card-img-top" src="{{asset('storage/'.$apartment->cover_image)}}" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">{{$apartment->title}}</h3>
            <p class="card-text descrizione">{{$apartment->descrizione_appartamento}}</p>
            <p class="indirizzo"><img class="indirizzo-img" src="https://image.flaticon.com/icons/svg/967/967848.svg" alt="">{{$apartment->indirizzo}},{{$apartment->city}}</p>
            <div id="map" style="width: 100%; height: 250px; margin-bottom: 3rem;">

            </div>

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
        </div>
        <input id="lat" type="text" name="" value="{{ $coordinate->lat}}" hidden>
        <input id="lon" type="text" name="" value="{{ $coordinate->lon}}" hidden>
      </div>
    </div>
  </main>
@endsection
