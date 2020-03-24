@extends('layouts.public')

@section('content')
    <main>
        <div class="container">
            <div class="row" id="servizi">
                <div class="col-sm-12 d-flex justify-content-center">
                    @foreach ($services as $service)
                        <div class="form-group mr-5">
                            <label for="{{$service->service_name}}">{{$service->service_name}}</label>
                            <input type="checkbox" id="{{$service->service_name}}" name="servizi" value="{{$service->id}}">
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="radius">Seleziona una distanza (km)</label>
                        <select id="radius" name="">
                            <option value="10">10</option>
                            <option value="20" selected>20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="row" id="filtered">
                @foreach ($apartments as $apartment)
                    @if ($apartment != null && $apartment->visible == 1)


                    <div class=" col-xl-3 col-lg-4 col-md-6 mb-4" >
                        <a id="a" href="{{route('dettagli',['apartment'=>$apartment->id])}}">
                        </a>
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

        <input type="text" id="lat" name="" value="{{$lat}}" hidden>
        <input type="text" id="lon" name="" value="{{$lon}}" hidden>

    </main>
    <script id="template" type="text/x-handlebars-template">
        <div class=" col-xl-3 col-lg-4 col-md-6 mb-4" >
            <a id="a" href="{{ url('dettagli/')}}/@{{id}}"></a>
            <div class="bg-white rounded shadow-sm" >
                <img src="{{ asset('storage/')}}/@{{ cover_image }}" alt="" class="img-fluid card-img-top team-4" >
                <div class="p-4">
                    <h5> @{{ title }} </h5>
                    <p class="small text-muted mb-0">@{{ city }}</p>
                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                        @{{{ end }}}
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/javascript">


    $(document).ready(function(){

        var template_html = $("#template").html();
        var template_function = Handlebars.compile(template_html);

        var lat = $('#lat').val();
        var lon = $('#lon').val();

        var query_lat_lon = '&lat=' + lat + '&lon=' + lon;

        $('select').change(function(){
            var now = moment().subtract(1, 'hour').format('YYYY-MM-DD h:mm:ss');
            console.log(now);
            var range = $(this).val();
            var array = [];
            $('#servizi input').each(function(){
                if($(this).prop("checked")) {
                    var thisValue = $(this).val();
                    var new_item = 'service[]=' + thisValue;
                    array.push(new_item);
                }
            });
            var new_query = array.join('&');
            var last_query = new_query + query_lat_lon + '&range=' + range;
            console.log(new_query);
            $.ajax ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url : '{{route('cerca')}}',
                data: last_query,
                success: function(response) {
                    console.log(response);
                    $('#filtered').empty();
                    for (var i = 0; i < response.length; i++) {
                        if (now < response[i].end_sponsor) {
                            var tag = '<p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Sponsorizzato</span></p>'
                        } else {
                            var tag = ''
                        };
                        var properties = {
                            'id' : response[i].id,
                            'cover_image' : response[i].cover_image,
                            'title' : response[i].title,
                            'city' : response[i].city,
                            'end': tag
                        };

                        var final = template_function(properties);
                        $('#filtered').append(final);
                    }
                },
                error: function(response) {
                    console.log(response)
                }
            })
        });


        $('input[type=checkbox]').on("click", function() {
            var now = moment().subtract(1, 'hour').format('YYYY-MM-DD h:mm:ss');
            console.log(now);
            var array = [];
            $('#servizi input').each(function(){
                if($(this).prop("checked")) {
                    var thisValue = $(this).val();
                    var new_item = 'service[]=' + thisValue;
                    array.push(new_item);
                }
            });
            var range = $('select option:selected').val();
            console.log(range);
            var new_query = array.join('&');
            var last_query = new_query + query_lat_lon + '&range=' + range;
            console.log(new_query);
            $.ajax ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url : '{{route('cerca')}}',
                data: last_query,
                success: function(response) {
                    console.log(response);
                    $('#filtered').empty();
                    for (var i = 0; i < response.length; i++) {
                        if (now < response[i].end_sponsor) {
                            var tag = '<p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Sponsorizzato</span></p>'
                        } else {
                            var tag = ''
                        };
                        var properties = {
                            'id' : response[i].id,
                            'cover_image' : response[i].cover_image,
                            'title' : response[i].title,
                            'city' : response[i].city,
                            'end': tag
                        };
                        var final = template_function(properties);
                        $('#filtered').append(final);
                    }
                },
                error: function(response) {
                    console.log(response)
                }
            })
        })
    });

    </script>


@endsection
