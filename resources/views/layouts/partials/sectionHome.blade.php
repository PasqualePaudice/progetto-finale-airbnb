<div class="content">
    <div class="col-sm-12">
        <div class="card mt-5" id="minJumbo">
            <div class="card-body p-5 d-flex justify-content-center align-center team4minJumbo">
                <div class="overlay">
                </div>
                <div class="d-flex flex-column justify-content-center text-center">
                    <h2>TROVA L'APPARTAMENTO NEL TUO STILE</h2>
                    <h4>I nostri appartamenti Premium</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="row">
            @foreach ($sponsoreds as $sponsored)
                @if ($sponsored->visible == 1)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4" >
                        <a class="vue_card_link" href="{{route('dettagli',['apartment'=>$sponsored->id])}}"></a>
                        <div class="bg-white rounded shadow-sm h-100 position-relative" >
                            <img src="{{asset('storage/'.$sponsored->cover_image)}}" alt="" class="img-fluid card-img-top team-4">
                            <div class="p-4">
                                <h5> {{$sponsored->title}}</h5>
                                <p class="small text-muted mb-0">{{$sponsored->city}}
                                @if ($sponsored->created_at > $mese_fa)
                                    <span class=" badge badge-danger px-3 rounded-pill font-weight-normal">
                                        New
                                    </span>
                                @endif
                                </p>
                            </div>
                            <span>
                                {{-- da aggiungere etichetta premium--}}
                            </span>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>






        <div class="section">



            <div class="row">

                @foreach ($apartments as $apartment)
                    @if ($apartment->visible == 1)

                        <div class="   col-xl-3 col-lg-4 col-md-6 mb-4" >


                                <a class="vue_card_link" href="{{route('dettagli',['apartment'=>$apartment->id])}}">   </a>
                                    <div class="bg-white rounded shadow-sm h-100" >
                                        <img src="{{asset('storage/'.$apartment->cover_image)}}" alt="" class="img-fluid card-img-top team-4" >
                                        <div class="p-4">
                                            <h5> {{$apartment->title}}</h5>
                                            <p class="small text-muted mb-0">{{$apartment->city}}</p>
                                            {{-- <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
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

                                            </div> --}}
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

    <div id="testingVue" class="containerteam4">

        <cardteam data-image="https://admin.pettinaviaggi.it/images/viaggi/345801e3-2b28-4dfe-a28d-3fd4ba539765_roma.jpg">
            <a slot="link" class="vue_card_link" href="{{ route('cerca') }}" onclick="event.preventDefault();
            document.getElementById('logout-form-roma').submit();"></a>
            <form id="logout-form-roma" slot="posting" action="{{ route('cerca') }}" method="post" style="display: none;">
                @csrf
                <input slot="lat" type="text" name="lat" value="41.89806" hidden>
                <input slot="lon" type="text" name="lon" value="12.50911" hidden>
            </form>
            <h1 slot="header">Roma</h1>
            <p slot="content">I migliori appartamenti a Roma</p>
        </cardteam>


        <cardteam data-image="https://media.timeout.com/images/105186767/image.jpg">
            <a slot="link" class="vue_card_link" href="{{ route('cerca') }}" onclick="event.preventDefault();
            document.getElementById('logout-form-milano').submit();"></a>
            <form id="logout-form-milano" slot="posting" action="{{ route('cerca') }}" method="post" style="display: none;">
                @csrf
                <input slot="lat" type="text" name="lat" value="45.46369" hidden>
                <input slot="lon" type="text" name="lon" value="9.19049" hidden>
            </form>
            <h1 slot="header">Milano</h1>
            <p slot="content">I migliori appartamenti a Milano</p>
        </cardteam>

        <cardteam data-image="https://www.mowgli.it/wp-content/uploads/2018/01/napoli-2.jpg">
            <a slot="link" class="vue_card_link" href="{{ route('cerca') }}" onclick="event.preventDefault();
            document.getElementById('logout-form-napoli').submit();"></a>
            <form id="logout-form-napoli" slot="posting" action="{{ route('cerca') }}" method="post" style="display: none;">
                @csrf
                <input slot="lat" type="text" name="lat" value="40.83546" hidden>
                <input slot="lon" type="text" name="lon" value="14.24827" hidden>
            </form>
            <h1 slot="header">Napoli</h1>
            <p slot="content">I migliori appartamenti a Napoli</p>
        </cardteam>

        <cardteam data-image="https://italianstudies.com.au/wp-content/uploads/2017/03/ccfirenze3.jpg">
            <a slot="link" class="vue_card_link" href="{{ route('cerca') }}" onclick="event.preventDefault();
            document.getElementById('logout-form-firenze').submit();"></a>
            <form id="logout-form-firenze" slot="posting" action="{{ route('cerca') }}" method="post" style="display: none;">
                @csrf
                <input slot="lat" type="text" name="lat" value="43.77319" hidden>
                <input slot="lon" type="text" name="lon" value="11.24964" hidden>
            </form>
            <h1 slot="header">Firenze</h1>
            <p slot="content">I migliori appartamenti a Firenze</p>
        </cardteam>

    </div>




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

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{{ asset('js/vue-card.js') }}" defer></script>

{{--
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
  <div class="page-scroll"> --}}
