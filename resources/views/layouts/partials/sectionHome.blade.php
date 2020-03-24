<div class="content">
    <div class="col-lg-6">
        <div class="card effect-1">
            <div class="card-body p-5">
                <h2 class="h5">TROVA L'APPARTAMENTO NEL TUO STILE</h2>
                <p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa facere, nam, labore, deleniti cupiditate ex expedita fugiat modi voluptas quam vero!</p>
            </div>
        </div>
        <div class='barra_ricerca_tomtom'></div>
    </div>








        <div class="section">



            <div class="row">

                @foreach ($apartments as $apartment)
                    @if ($apartment->visible == 1)

                        <div class="   col-xl-3 col-lg-4 col-md-6 mb-4" >


                                <a id="a" href="{{route('dettagli',['apartment'=>$apartment->id])}}">   </a>
                                    <div class="bg-white rounded shadow-sm" >
                                        <img src="{{asset('storage/'.$apartment->cover_image)}}" alt="" class="img-fluid card-img-top team-4" >
                                        <div class="p-4">
                                            <h5> {{$apartment->title}}</h5>
                                            <p class="small text-muted mb-0">{{$apartment->city}}</p>
                                            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                                                @php
                                                    $apartment_sponsors = DB::table('apartment_sponsor')->where('apartment_id', $apartment->id)->where('end_sponsor', '>=' , $now )->get()
                                                @endphp

                                                @if ($apartment->created_at > $mese_fa)
                                                    <div class=" badge badge-danger px-3 rounded-pill font-weight-normal">
                                                        New
                                                    </div>
                                                @endif
                                                @if (count($apartment_sponsors))
                                                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Sponsorizzato</span></p>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </div>
    <form class="" action="{{ route('cerca') }}" method="post">
        @csrf
        <input id="search_lat" type="text" name="lat" value="" hidden>
        <input id="search_lon" type="text" name="lon" value="" hidden>
        <input id="search_name" type="text" name="name" value="" hidden>
        <button id="search_btn" type="submit" hidden></button>
    </form>


    <script>

        // Options for the fuzzySearch service
        var searchOptions = {
            key: 'YPixAIIG2SgrHPBm2WGBWUa9L4JiGcFe',
            language: 'it-IT',
            limit: 5
        };
        // Options for the autocomplete service
        var autocompleteOptions = {
            key: 'YPixAIIG2SgrHPBm2WGBWUa9L4JiGcFe',
            language: 'it-IT',
        };
        var searchBoxOptions = {
            minNumberOfCharacters: 0,
            searchOptions: searchOptions,
            autocompleteOptions: autocompleteOptions
        };
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, searchBoxOptions);
        document.querySelector('.barra_ricerca_tomtom').appendChild(ttSearchBox.getSearchBoxHTML());
        ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {
            var name = data.data.result.address.municipality;
            var lat = data.data.result.position['lat'];
            var lon = data.data.result.position['lng'];
            console.log(data.data.result.position);
            console.log(lat);
            console.log(lon);

            document.querySelector("#search_lat").setAttribute('value', lat);
            document.querySelector("#search_lon").setAttribute('value', lon);
            document.querySelector("#search_name").setAttribute('value', name);
            document.getElementById("search_btn").click();

        });
    </script>


            {{-- <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-sm"><img src="https://cdn.pixabay.com/photo/2019/03/31/14/31/italy-4093227__340.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                    <h5> <a href="#" class="text-dark">TITOLO</a></h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">TESTO</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">New</div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-sm"><img src="https://cdn.pixabay.com/photo/2019/03/31/14/31/italy-4093227__340.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                    <h5> <a href="#" class="text-dark">TITOLO</a></h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">TESTO</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">New</div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-sm"><img src="https://cdn.pixabay.com/photo/2019/03/31/14/31/italy-4093227__340.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                    <h5> <a href="#" class="text-dark">TITOLO</a></h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">TESTO</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">New</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
</div>
<hr>
<div class="content">
    <div class="col-lg-6">
        <div class="card effect-1">
            <div class="card-body p-5">
                <h2 class="h5">TROVA LE VACANZE NEL TUO STILE</h2>
                <p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa facere, nam, labore, deleniti cupiditate ex expedita fugiat modi voluptas quam vero!</p>
            </div>
        </div>
    </div>
        <div class="section">
            <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-sm"><img src="https://cdn.pixabay.com/photo/2019/03/31/14/31/italy-4093227__340.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                    <h5> <a href="#" class="text-dark">TITOLO</a></h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">TESTO</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">New</div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-sm"><img src="https://cdn.pixabay.com/photo/2019/03/31/14/31/italy-4093227__340.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                    <h5> <a href="#" class="text-dark">TITOLO</a></h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">TESTO</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">New</div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-sm"><img src="https://cdn.pixabay.com/photo/2019/03/31/14/31/italy-4093227__340.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                    <h5> <a href="#" class="text-dark">TITOLO</a></h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">TESTO</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">New</div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="bg-white rounded shadow-sm"><img src="https://cdn.pixabay.com/photo/2019/03/31/14/31/italy-4093227__340.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                    <h5><a href="#" class="text-dark">TITOLO</a></h5>
                    <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">TESTO</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">New</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
</div>
<hr>
<div class="section">
    <div class="col-lg-12">
        <div class="grid">
            <div class="sector">
                <img src="{{ asset("img/shield.png")  }}" alt=""/>
                <h5 class="text-dark">Con noi la tua vacanza e' piu' al sicuro</h5>
                <p class="small text-muted mb-0">Pagamenti sicuri, servizio attenzione al cliente 24h su 24h e Garanzia Prenotazione Sicura</p>
            </div>
            <div class="sector">
                <img src="{{ asset("img/worldwide.png")  }}" alt=""/>
                <h5 class="text-dark">Le migliori vacanze cominciano qui</h5>
                <p class="small text-muted mb-0">Dalla prenotazione al soggiorno, l’intero processo è facile e piacevole</p>
            </div>
            <div class="sector">
                <img src="{{ asset("img/coffee-cup.png")  }}" alt=""/>
                <h5 class="text-dark">Tutti i confort che desideri di una casa</h5>
                <p class="small text-muted mb-0">Cucina con tutte le comodità, lavanderia, piscina, giardino e molto altro</p>
            </div>
            <div class="sector">
                <img src="{{ asset("img/premium.png")  }}" alt=""/>
                <h5 class="text-dark">Molto più che una casa vacanza</h5>
                <p class="small text-muted mb-0">Più spazio, più privacy, più servizi... migliore qualità!</p>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-2 animated fadeInLeft delay-1s">Pubblica il tuo annuncio</h1>
      <p class="lead animated lightSpeedIn delay-2s">Entra a far parte del mondo degli affitti</p>
      <button type="button" class="animated jackInTheBox delay-2s"><a href="{{ route('register') }}">Pubblica il tuo annuncio</a></button>
    </div>
  </div>
  <div class="page-scroll">


 --}}
