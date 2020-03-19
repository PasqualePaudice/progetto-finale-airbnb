@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row mb-3">
      <div class="col-sm-12">
        <h1>Dettagli appartamento</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card" style="width: 100%;">

          <img style="width:200px" class="card-img-top" src="{{$apartment->cover_image ? asset('storage/' . $apartment->cover_image) : asset('storage/uploads/unnamed.jpg')}}" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">{{$apartment->title}}</h3>
            <p class="card-text">{{$apartment->descrizione_appartamento}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Indirizzo: {{$apartment->indirizzo}}</li>
            <li class="list-group-item">Stanze: {{$apartment->stanze}}</li>
            <li class="list-group-item">Posti letto: {{$apartment->posti_letto}}</li>
            <li class="list-group-item">Bagni: {{$apartment->bagni}}</li>
            <li class="list-group-item">Metri quadri: {{$apartment->metri_quadri}}</li>
            <li class="list-group-item">Creato in data: {{$apartment->created_at}}</li>

          </ul>
          <div class="card-body">
            <h5>Servizi</h5>
            <ul>

            @forelse ($apartment->services as $service)

                <li>{{$service->service_name}}</li>

            @empty

                <li>--Non ci sono servizi aggiuntivi--</li>

            @endforelse ($services as $key => $value)
            </ul>

            </div>
            <div id="map" style="width: 500px; height: 500px; margin-left:10px; margin-top:10px">



             </div>
        </div>

      </div>

        <input id="lat" type="text" name="" value="{{ $coordinate->lat }}" hidden>
        <input id="lon" type="text" name="" value="{{ $coordinate->lon }}" hidden>




    </div>




  </div>


@endsection
