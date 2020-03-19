@extends('layouts.public')

@section('content')
  <main>
    <div class="container">
      <div class="row">
        <div class="card mb-3">
          <img class="card-img-top" src="https://uptown-milano.it/wp-content/uploads/2018/06/Opengraphs-appartamenti.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Titolo appartamento</h3>
            <p class="card-text descrizione">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p class="indirizzo"><img class="indirizzo-img" src="https://image.flaticon.com/icons/svg/967/967848.svg" alt="">Via Roma, 123</p>
            <div id="map" style="width: 100%; height: 250px; margin-bottom: 3rem;">

            </div>

            <h6 class="card-text dettagli">Dettagli</h6>
            <ul>
              <li><img src="https://image.flaticon.com/icons/svg/515/515159.svg" alt=""> Metri quadri: 85</li>
              <li><img src="https://image.flaticon.com/icons/svg/515/515123.svg" alt=""> Stanze: 3</li>
              <li><img src="https://image.flaticon.com/icons/svg/1530/1530735.svg" alt=""> Posti letto: 4</li>
              <li><img src="https://image.flaticon.com/icons/svg/1606/1606180.svg" alt=""> Bagni: 2</li>
            </ul>
            <h6 class="card-text dettagli">Servizi</h6>
            <ul>
              <li><img src="https://image.flaticon.com/icons/svg/263/263114.svg" alt=""> WiFi</li>
              <li><img src="https://image.flaticon.com/icons/svg/1858/1858158.svg" alt=""> Sauna</li>
              <li><img src="https://image.flaticon.com/icons/svg/430/430470.svg" alt=""> Vista Mare</li>
              <li><img src="https://image.flaticon.com/icons/svg/495/495815.svg" alt=""> Piscina</li>
              <li><img src="https://image.flaticon.com/icons/svg/2439/2439889.svg" alt=""> Posto Macchina</li>
              <li><img src="https://image.flaticon.com/icons/svg/1720/1720008.svg" alt=""> Portineria</li>
            </ul>
          </div>
        </div>
        <input id="lat" type="text" name="" value="{{ $coordinate->lat}}" hidden>
        <input id="lon" type="text" name="" value="{{ $coordinate->lon}}" hidden>
      </div>
    </div>
  </main>
@endsection
