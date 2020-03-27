<div class="content">
    <div class="col-sm-12">
        <div class="card mt-5" id="minJumbo">
            <div class="card-body p-5 d-flex justify-content-center align-center team4minJumbo">
                <div class="overlay">
                </div>
                <div class="d-flex flex-column justify-content-center text-center">
                    <h2 id="smaller">TROVA L'APPARTAMENTO NEL TUO STILE</h2>
                    <h4>I nostri appartamenti Premium</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="row" >
            @foreach ($sponsoreds as $sponsored)
                @if ($sponsored->visible == 1)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 " >
                        <a class="vue_card_link" href="{{route('dettagli',['apartment'=>$sponsored->id])}}"></a>
                        <div class="bg-white rounded  h-100 position-relative premium-shadow" >
                            <svg class="premium" slot="premium" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            	 viewBox="0 0 370.04 370.04" style="enable-background:new 0 0 370.04 370.04;" xml:space="preserve">
                                <g>
                                	<g id="Layer_5_21_">
                                		<g>
                                			<path d="M341.668,314.412c0,0-41.071-70.588-48.438-83.248c8.382-2.557,17.311-4.815,21.021-11.221
                                				c6.183-10.674-4.823-28.184-1.933-39.625c2.977-11.775,20.551-21.964,20.551-33.933c0-11.661-18.169-25.284-21.148-36.99
                                				c-2.91-11.439,8.063-28.968,1.86-39.629c-6.203-10.662-26.864-9.786-35.369-17.97c-8.751-8.422-8.724-29.028-19.279-34.672
                                				c-10.598-5.665-27.822,5.784-39.589,3.072C207.711,17.515,197.318,0,185.167,0c-12.331,0-31.944,19.868-35.02,20.583
                                				c-11.761,2.734-29.007-8.687-39.594-2.998c-10.545,5.663-10.48,26.271-19.215,34.707c-8.491,8.199-29.153,7.361-35.337,18.035
                                				c-6.183,10.672,4.823,28.178,1.934,39.625c-2.897,11.476-21.083,23.104-21.083,36.376c0,11.97,17.618,22.127,20.613,33.896
                                				c2.911,11.439-8.062,28.966-1.859,39.631c3.377,5.805,11.039,8.188,18.691,10.479c0.893,0.267,2.582,1.266,1.438,2.933
                                				c-5.235,9.036-47.37,81.755-47.37,81.755c-3.352,5.784-0.63,10.742,6.047,11.023l32.683,1.363
                                				c6.677,0.281,15.053,5.133,18.617,10.786l17.44,27.674c3.564,5.653,9.219,5.547,12.57-0.236c0,0,48.797-84.246,48.817-84.27
                                				c0.979-1.144,1.963-0.909,2.434-0.509c5.339,4.546,12.782,9.081,18.994,9.081c6.092,0,11.733-4.269,17.313-9.03
                                				c0.454-0.387,1.559-1.18,2.367,0.466c0.013,0.026,48.756,83.811,48.756,83.811c3.36,5.776,9.016,5.874,12.569,0.214
                                				l17.391-27.707c3.554-5.657,11.921-10.528,18.598-10.819l32.68-1.424C342.315,325.152,345.028,320.187,341.668,314.412z
                                				 M239.18,238.631c-36.136,21.023-79.511,18.77-112.641-2.127c-48.545-31.095-64.518-95.419-35.335-145.788
                                				c29.516-50.95,94.399-68.928,145.808-40.929c0.27,0.147,0.537,0.299,0.805,0.449c0.381,0.211,0.761,0.425,1.14,0.641
                                				c15.86,9.144,29.613,22.415,39.461,39.342C308.516,141.955,290.915,208.533,239.18,238.631z"/>
                                			<path d="M230.916,66.103c-0.15-0.087-0.302-0.168-0.452-0.254C203.002,49.955,168,48.793,138.665,65.86
                                				c-43.532,25.326-58.345,81.345-33.019,124.876c7.728,13.284,18.318,23.888,30.536,31.498c1.039,0.658,2.09,1.305,3.164,1.927
                                				c43.579,25.247,99.568,10.333,124.814-33.244C289.405,147.338,274.495,91.35,230.916,66.103z M241.818,137.344l-15.259,14.873
                                				c-4.726,4.606-7.68,13.698-6.563,20.203l3.602,21.001c1.116,6.505-2.75,9.314-8.592,6.243l-18.861-9.916
                                				c-5.842-3.071-15.401-3.071-21.243,0l-18.86,9.916c-5.842,3.071-9.709,0.262-8.593-6.243l3.602-21.001
                                				c1.116-6.505-1.838-15.597-6.564-20.203l-15.258-14.873c-4.727-4.606-3.249-9.152,3.282-10.102l21.086-3.064
                                				c6.531-0.949,14.265-6.568,17.186-12.486l9.43-19.107c2.921-5.918,7.701-5.918,10.621,0l9.431,19.107
                                				c2.921,5.918,10.654,11.537,17.186,12.486l21.086,3.064C245.067,128.192,246.544,132.738,241.818,137.344z"/>
                                		</g>
                                	</g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                            <img src="{{asset('storage/'.$sponsored->cover_image)}}" alt="" class="img-fluid card-img-top team-4">
                            <div class="p-4">
                                <h5> {{$sponsored->title}}</h5>
                                <p class="d-flex justify-content-between small text-muted mb-0"><span>{{$sponsored->city}}</span>
                                @if ($sponsored->created_at > $mese_fa)
                                    <span class="ml-2 my-1 badge badge-danger px-3 rounded-pill font-weight-normal">
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

    <div class="section ">
        <h2>Le città in tendenza</h2>
    </div>
    <div id="testingVue" class="containerteam4 mt-5" >

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


    <div class="section mt-5">
        <h2>Inizia a sognare il prossimo viaggio</h2>
    </div>



        <div class="section ">


            <div class="row more">

                @foreach ($apartments as $apartment)
                    @if ($apartment->visible == 1)
                        @php
                            $apartment_sponsors = DB::table('apartment_sponsor')->where('apartment_id', $apartment->id)->where('end_sponsor', '>=' , $now )->get()
                        @endphp

                        <div class="   col-xl-3 col-lg-4 col-md-6 mb-4 d-none" >




                                <a class="vue_card_link" href="{{route('dettagli',['apartment'=>$apartment->id])}}">   </a>

                                    <div class="bg-white rounded  h-100 position-relative {{ count($apartment_sponsors) ? 'premium-shadow' : 'shadow-sm'}}" >
                                        @if (count($apartment_sponsors))
                                            <svg class="premium" slot="premium" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 370.04 370.04" style="enable-background:new 0 0 370.04 370.04;" xml:space="preserve">
                                                <g>
                                                    <g id="Layer_5_21_">
                                                        <g>
                                                            <path d="M341.668,314.412c0,0-41.071-70.588-48.438-83.248c8.382-2.557,17.311-4.815,21.021-11.221
                                                                c6.183-10.674-4.823-28.184-1.933-39.625c2.977-11.775,20.551-21.964,20.551-33.933c0-11.661-18.169-25.284-21.148-36.99
                                                                c-2.91-11.439,8.063-28.968,1.86-39.629c-6.203-10.662-26.864-9.786-35.369-17.97c-8.751-8.422-8.724-29.028-19.279-34.672
                                                                c-10.598-5.665-27.822,5.784-39.589,3.072C207.711,17.515,197.318,0,185.167,0c-12.331,0-31.944,19.868-35.02,20.583
                                                                c-11.761,2.734-29.007-8.687-39.594-2.998c-10.545,5.663-10.48,26.271-19.215,34.707c-8.491,8.199-29.153,7.361-35.337,18.035
                                                                c-6.183,10.672,4.823,28.178,1.934,39.625c-2.897,11.476-21.083,23.104-21.083,36.376c0,11.97,17.618,22.127,20.613,33.896
                                                                c2.911,11.439-8.062,28.966-1.859,39.631c3.377,5.805,11.039,8.188,18.691,10.479c0.893,0.267,2.582,1.266,1.438,2.933
                                                                c-5.235,9.036-47.37,81.755-47.37,81.755c-3.352,5.784-0.63,10.742,6.047,11.023l32.683,1.363
                                                                c6.677,0.281,15.053,5.133,18.617,10.786l17.44,27.674c3.564,5.653,9.219,5.547,12.57-0.236c0,0,48.797-84.246,48.817-84.27
                                                                c0.979-1.144,1.963-0.909,2.434-0.509c5.339,4.546,12.782,9.081,18.994,9.081c6.092,0,11.733-4.269,17.313-9.03
                                                                c0.454-0.387,1.559-1.18,2.367,0.466c0.013,0.026,48.756,83.811,48.756,83.811c3.36,5.776,9.016,5.874,12.569,0.214
                                                                l17.391-27.707c3.554-5.657,11.921-10.528,18.598-10.819l32.68-1.424C342.315,325.152,345.028,320.187,341.668,314.412z
                                                                 M239.18,238.631c-36.136,21.023-79.511,18.77-112.641-2.127c-48.545-31.095-64.518-95.419-35.335-145.788
                                                                c29.516-50.95,94.399-68.928,145.808-40.929c0.27,0.147,0.537,0.299,0.805,0.449c0.381,0.211,0.761,0.425,1.14,0.641
                                                                c15.86,9.144,29.613,22.415,39.461,39.342C308.516,141.955,290.915,208.533,239.18,238.631z"/>
                                                            <path d="M230.916,66.103c-0.15-0.087-0.302-0.168-0.452-0.254C203.002,49.955,168,48.793,138.665,65.86
                                                                c-43.532,25.326-58.345,81.345-33.019,124.876c7.728,13.284,18.318,23.888,30.536,31.498c1.039,0.658,2.09,1.305,3.164,1.927
                                                                c43.579,25.247,99.568,10.333,124.814-33.244C289.405,147.338,274.495,91.35,230.916,66.103z M241.818,137.344l-15.259,14.873
                                                                c-4.726,4.606-7.68,13.698-6.563,20.203l3.602,21.001c1.116,6.505-2.75,9.314-8.592,6.243l-18.861-9.916
                                                                c-5.842-3.071-15.401-3.071-21.243,0l-18.86,9.916c-5.842,3.071-9.709,0.262-8.593-6.243l3.602-21.001
                                                                c1.116-6.505-1.838-15.597-6.564-20.203l-15.258-14.873c-4.727-4.606-3.249-9.152,3.282-10.102l21.086-3.064
                                                                c6.531-0.949,14.265-6.568,17.186-12.486l9.43-19.107c2.921-5.918,7.701-5.918,10.621,0l9.431,19.107
                                                                c2.921,5.918,10.654,11.537,17.186,12.486l21.086,3.064C245.067,128.192,246.544,132.738,241.818,137.344z"/>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                            </svg>
                                        @endif
                                        <img src="{{asset('storage/'.$apartment->cover_image)}}" alt="" class="img-fluid card-img-top team-4" >
                                        <div class="p-4">
                                            <h5> {{$apartment->title}}</h5>
                                            <p class="small d-flex justify-content-between text-muted mb-0"><span>{{$apartment->city}}</span>
                                                @if ($apartment->created_at > $mese_fa)
                                                    <span class="ml-2 my-1 badge badge-danger px-3 rounded-pill font-weight-normal">
                                                        New
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                        </div>
                    @endif
                @endforeach
                <section class="w-100">
                    <p id="mostra" class="font-weight-bold d-none" >Mostra di più...</p>
                    <p id="nascondi" class=" font-weight-bold d-none" >Mostra meno</p>
                </section>



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



    <div class="section">
        <div class="col-sm-12">
            <div class="grid">
                <div class="sector col-lg-3 col-md-6 col-sm-12">
                    <img src="{{ asset("img/shield.png")  }}" alt=""/>
                    <h5 class="text-dark">Con noi la tua vacanza e' piu' al sicuro</h5>
                    <p class="small text-muted mb-0">Pagamenti sicuri, servizio attenzione al cliente 24h su 24h e Garanzia Prenotazione Sicura</p>
                </div>
                <div class="sector col-lg-3 col-md-6 col-sm-12">
                    <img src="{{ asset("img/worldwide.png")  }}" alt=""/>
                    <h5 class="text-dark">Le migliori vacanze cominciano qui</h5>
                    <p class="small text-muted mb-0">Dalla prenotazione al soggiorno, l’intero processo è facile e piacevole</p>
                </div>
                <div class="sector col-lg-3 col-md-6 col-sm-12">
                    <img src="{{ asset("img/coffee-cup.png")  }}" alt=""/>
                    <h5 class="text-dark">Tutti i confort che desideri di una casa</h5>
                    <p class="small text-muted mb-0">Cucina con tutte le comodità, lavanderia, piscina, giardino e molto altro</p>
                </div>
                <div class="sector col-lg-3 col-md-6 col-sm-12">
                    <img src="{{ asset("img/premium.png")  }}" alt=""/>
                    <h5 class="text-dark">Molto più che una casa vacanza</h5>
                    <p class="small text-muted mb-0">Più spazio, più privacy, più servizi... migliore qualità!</p>
                </div>
            </div>
        </div>
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










        for (var i = 1; i < 5; i++) {
            $('.row.more > div:nth-child(' + i + ')').removeClass('d-none');
        }

        if($('.row.more > div').length > 4){
            $('#mostra').removeClass('d-none');

            $('#mostra').click(function(){
                $('.row.more > div').removeClass('d-none');
                $('#mostra').addClass('d-none');
                $('#nascondi').removeClass('d-none');

            });


            $('#nascondi').click(function(){

                for (var i = 5; i <= $('.row.more > div').length; i++) {
                    $('.row.more > div:nth-child(' + i + ')').addClass('d-none');
                }
                $('#mostra').removeClass('d-none');
                $('#nascondi').addClass('d-none');

            });
        }




    </script>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="{{ asset('js/vue-card.js') }}" defer></script>
