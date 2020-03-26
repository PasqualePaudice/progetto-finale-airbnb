@extends('layouts.public')

@section('content')
    <main>
        <div class="container">
            <div class="row" id="servizi">
                <div class="col-sm-12 d-flex justify-content-center">

                    <div class="container2">

                        <ul class="ks-cboxtags">


                        @foreach ($services as $service)

                                <li><input type="checkbox" id="{{$service->service_name}}" name="servizi" value="{{$service->id}}"><label for="{{$service->service_name}}">{{$service->service_name}}</label></li>


                        @endforeach

                        </ul>
                        <div class="center">
                            <select id="sources" name="sources" class="custom-select sources" placeholder="Distanza">
                                <option value="10">10</option>
                                <option value="20" selected="selected">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>
                        </div>

                    </div>


                </div>

            </div>
        </div>



        <div class="section">
            <div class="row" id="filtered">
                @foreach ($apartments as $apartment)
                    @if ($apartment != null && $apartment->visible == 1)

                        @php
                            $apartment_sponsors = DB::table('apartment_sponsor')->where('apartment_id', $apartment->id)->where('end_sponsor', '>=' , $now )->get()
                        @endphp

                    <div class=" col-xl-3 col-lg-4 col-md-6 mb-4" >
                        <a class="vue_card_link" href="{{route('dettagli',['apartment'=>$apartment->id])}}">
                        </a>
                                <div  class="bg-white rounded  h-100 position-relative {{ count($apartment_sponsors) ? 'premium-shadow' : 'shadow-sm'}}" >
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


            </div>
        </div>

        <input type="text" id="lat" name="" value="{{$lat}}" hidden>
        <input type="text" id="lon" name="" value="{{$lon}}" hidden>

    </main>
    <script id="template" type="text/x-handlebars-template">
        <div class=" col-xl-3 col-lg-4 col-md-6 mb-4" >
            <a class="vue_card_link" href="{{ url('dettagli/')}}/@{{id}}"></a>
            <div class="bg-white rounded  h-100 position-relative @{{classe}}" >
                @{{{ end }}}
                <img src="{{ asset('storage/')}}/@{{ cover_image }}" alt="" class="img-fluid card-img-top team-4" >
                <div class="p-4">
                    <h5> @{{ title }} </h5>
                    <p class="small d-flex justify-content-between text-muted mb-0"><span>@{{ city }}</span> @{{{ now }}}  </p>

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

        $('div.center').click(function(){
            console.log($(this).find('.custom-select-wrapper .custom-select .custom-select-trigger').html());
            var now = moment().subtract(1, 'hour').format('YYYY-MM-DD h:mm:ss');
            console.log(now);
            var one_month = moment().subtract(1, 'month').format('YYYY-MM-DD h:mm:ss');
            console.log(one_month);
            var range = $(this).find('.custom-select-wrapper .custom-select .custom-select-trigger').html();
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
                        if (response[i].created_at > one_month) {
                            var new_tag = '<span class="ml-2 my-1 badge badge-danger px-3 rounded-pill font-weight-normal">New</span>';

                        } else {
                            var new_tag = ''
                        };
                        if (now < response[i].end_sponsor) {
                            var tag = `<svg class="premium" enable-background="new 0 0 370.04 370.04" slot="premium" version="1.1" viewBox="0 0 370.04 370.04" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">



                                                        <path d="m341.67 314.41s-41.071-70.588-48.438-83.248c8.382-2.557 17.311-4.815 21.021-11.221 6.183-10.674-4.823-28.184-1.933-39.625 2.977-11.775 20.551-21.964 20.551-33.933 0-11.661-18.169-25.284-21.148-36.99-2.91-11.439 8.063-28.968 1.86-39.629-6.203-10.662-26.864-9.786-35.369-17.97-8.751-8.422-8.724-29.028-19.279-34.672-10.598-5.665-27.822 5.784-39.589 3.072-11.633-2.681-22.026-20.196-34.177-20.196-12.331 0-31.944 19.868-35.02 20.583-11.761 2.734-29.007-8.687-39.594-2.998-10.545 5.663-10.48 26.271-19.215 34.707-8.491 8.199-29.153 7.361-35.337 18.035-6.183 10.672 4.823 28.178 1.934 39.625-2.897 11.476-21.083 23.104-21.083 36.376 0 11.97 17.618 22.127 20.613 33.896 2.911 11.439-8.062 28.966-1.859 39.631 3.377 5.805 11.039 8.188 18.691 10.479 0.893 0.267 2.582 1.266 1.438 2.933-5.235 9.036-47.37 81.755-47.37 81.755-3.352 5.784-0.63 10.742 6.047 11.023l32.683 1.363c6.677 0.281 15.053 5.133 18.617 10.786l17.44 27.674c3.564 5.653 9.219 5.547 12.57-0.236 0 0 48.797-84.246 48.817-84.27 0.979-1.144 1.963-0.909 2.434-0.509 5.339 4.546 12.782 9.081 18.994 9.081 6.092 0 11.733-4.269 17.313-9.03 0.454-0.387 1.559-1.18 2.367 0.466 0.013 0.026 48.756 83.811 48.756 83.811 3.36 5.776 9.016 5.874 12.569 0.214l17.391-27.707c3.554-5.657 11.921-10.528 18.598-10.819l32.68-1.424c6.674-0.293 9.387-5.258 6.027-11.033zm-102.49-75.781c-36.136 21.023-79.511 18.77-112.64-2.127-48.545-31.095-64.518-95.419-35.335-145.79 29.516-50.95 94.399-68.928 145.81-40.929 0.27 0.147 0.537 0.299 0.805 0.449 0.381 0.211 0.761 0.425 1.14 0.641 15.86 9.144 29.613 22.415 39.461 39.342 30.098 51.736 12.497 118.31-39.238 148.41z"/><path d="m230.92 66.103c-0.15-0.087-0.302-0.168-0.452-0.254-27.462-15.894-62.464-17.056-91.799 0.011-43.532 25.326-58.345 81.345-33.019 124.88 7.728 13.284 18.318 23.888 30.536 31.498 1.039 0.658 2.09 1.305 3.164 1.927 43.579 25.247 99.568 10.333 124.81-33.244 25.245-43.579 10.335-99.567-33.244-124.81zm10.902 71.241-15.259 14.873c-4.726 4.606-7.68 13.698-6.563 20.203l3.602 21.001c1.116 6.505-2.75 9.314-8.592 6.243l-18.861-9.916c-5.842-3.071-15.401-3.071-21.243 0l-18.86 9.916c-5.842 3.071-9.709 0.262-8.593-6.243l3.602-21.001c1.116-6.505-1.838-15.597-6.564-20.203l-15.258-14.873c-4.727-4.606-3.249-9.152 3.282-10.102l21.086-3.064c6.531-0.949 14.265-6.568 17.186-12.486l9.43-19.107c2.921-5.918 7.701-5.918 10.621 0l9.431 19.107c2.921 5.918 10.654 11.537 17.186 12.486l21.086 3.064c6.53 0.95 8.007 5.496 3.281 10.102z"/>
                                                        </svg>`;

                            var classe = 'premium-shadow';
                        } else {
                            var tag = '';
                            var classe = 'shadow-sm';
                        };
                        var properties = {
                            'id' : response[i].id,
                            'cover_image' : response[i].cover_image,
                            'title' : response[i].title,
                            'city' : response[i].city,
                            'end': tag,
                            'now': new_tag,
                            'classe':classe
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
            var one_month = moment().subtract(1, 'month').format('YYYY-MM-DD h:mm:ss');
            console.log(one_month);
            var array = [];
            $('#servizi input').each(function(){
                if($(this).prop("checked")) {
                    var thisValue = $(this).val();
                    var new_item = 'service[]=' + thisValue;
                    array.push(new_item);
                }
            });

            var range =  $('.center').find('.custom-select-wrapper .custom-select .custom-select-trigger').html();
            if (range == 'Distanza') {
                range='20';
            }
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
                        if (response[i].created_at > one_month) {
                            var new_tag = '<span class="ml-2 my-1 badge badge-danger px-3 rounded-pill font-weight-normal">New</span>';
                        } else {
                            var new_tag = ''
                        };
                        if (now < response[i].end_sponsor) {
                            var tag = `<svg class="premium" enable-background="new 0 0 370.04 370.04" slot="premium" version="1.1" viewBox="0 0 370.04 370.04" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">



                                                        <path d="m341.67 314.41s-41.071-70.588-48.438-83.248c8.382-2.557 17.311-4.815 21.021-11.221 6.183-10.674-4.823-28.184-1.933-39.625 2.977-11.775 20.551-21.964 20.551-33.933 0-11.661-18.169-25.284-21.148-36.99-2.91-11.439 8.063-28.968 1.86-39.629-6.203-10.662-26.864-9.786-35.369-17.97-8.751-8.422-8.724-29.028-19.279-34.672-10.598-5.665-27.822 5.784-39.589 3.072-11.633-2.681-22.026-20.196-34.177-20.196-12.331 0-31.944 19.868-35.02 20.583-11.761 2.734-29.007-8.687-39.594-2.998-10.545 5.663-10.48 26.271-19.215 34.707-8.491 8.199-29.153 7.361-35.337 18.035-6.183 10.672 4.823 28.178 1.934 39.625-2.897 11.476-21.083 23.104-21.083 36.376 0 11.97 17.618 22.127 20.613 33.896 2.911 11.439-8.062 28.966-1.859 39.631 3.377 5.805 11.039 8.188 18.691 10.479 0.893 0.267 2.582 1.266 1.438 2.933-5.235 9.036-47.37 81.755-47.37 81.755-3.352 5.784-0.63 10.742 6.047 11.023l32.683 1.363c6.677 0.281 15.053 5.133 18.617 10.786l17.44 27.674c3.564 5.653 9.219 5.547 12.57-0.236 0 0 48.797-84.246 48.817-84.27 0.979-1.144 1.963-0.909 2.434-0.509 5.339 4.546 12.782 9.081 18.994 9.081 6.092 0 11.733-4.269 17.313-9.03 0.454-0.387 1.559-1.18 2.367 0.466 0.013 0.026 48.756 83.811 48.756 83.811 3.36 5.776 9.016 5.874 12.569 0.214l17.391-27.707c3.554-5.657 11.921-10.528 18.598-10.819l32.68-1.424c6.674-0.293 9.387-5.258 6.027-11.033zm-102.49-75.781c-36.136 21.023-79.511 18.77-112.64-2.127-48.545-31.095-64.518-95.419-35.335-145.79 29.516-50.95 94.399-68.928 145.81-40.929 0.27 0.147 0.537 0.299 0.805 0.449 0.381 0.211 0.761 0.425 1.14 0.641 15.86 9.144 29.613 22.415 39.461 39.342 30.098 51.736 12.497 118.31-39.238 148.41z"/><path d="m230.92 66.103c-0.15-0.087-0.302-0.168-0.452-0.254-27.462-15.894-62.464-17.056-91.799 0.011-43.532 25.326-58.345 81.345-33.019 124.88 7.728 13.284 18.318 23.888 30.536 31.498 1.039 0.658 2.09 1.305 3.164 1.927 43.579 25.247 99.568 10.333 124.81-33.244 25.245-43.579 10.335-99.567-33.244-124.81zm10.902 71.241-15.259 14.873c-4.726 4.606-7.68 13.698-6.563 20.203l3.602 21.001c1.116 6.505-2.75 9.314-8.592 6.243l-18.861-9.916c-5.842-3.071-15.401-3.071-21.243 0l-18.86 9.916c-5.842 3.071-9.709 0.262-8.593-6.243l3.602-21.001c1.116-6.505-1.838-15.597-6.564-20.203l-15.258-14.873c-4.727-4.606-3.249-9.152 3.282-10.102l21.086-3.064c6.531-0.949 14.265-6.568 17.186-12.486l9.43-19.107c2.921-5.918 7.701-5.918 10.621 0l9.431 19.107c2.921 5.918 10.654 11.537 17.186 12.486l21.086 3.064c6.53 0.95 8.007 5.496 3.281 10.102z"/>
                                                        </svg>`;
                            var classe = 'premium-shadow';
                        } else {
                            var tag = '';
                            var classe = 'shadow-sm';
                        };
                        var properties = {
                            'id' : response[i].id,
                            'cover_image' : response[i].cover_image,
                            'title' : response[i].title,
                            'city' : response[i].city,
                            'end': tag,
                            'now': new_tag,
                            'classe':classe
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

    {{-- script filtri --}}

    <script type="text/javascript">
        $(document).ready(function(){

            $(".custom-select").each(function() {
                      var classes = $(this).attr("class"),
                          id      = $(this).attr("id"),
                          name    = $(this).attr("name");
                      var template =  '<div class="' + classes + '">';
                          template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
                          template += '<div class="custom-options">';
                          $(this).find("option").each(function() {
                            template += '<span class="custom-option ' + $(this).attr("class") + '" value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
                        });
                      template += '</div></div>';

                      $(this).wrap('<div class="custom-select-wrapper"></div>');
                      $(this).hide();
                      $(this).after(template);
                    });
                    $(".custom-option:first-of-type").hover(function() {
                      $(this).parents(".custom-options").addClass("option-hover");
                    }, function() {
                      $(this).parents(".custom-options").removeClass("option-hover");
                    });
                    $(".custom-select-trigger").on("click", function() {
                      $('html').one('click',function() {
                        $(".custom-select").removeClass("opened");
                      });
                      $(this).parents(".custom-select").toggleClass("opened");
                      event.stopPropagation();
                    });
                    $(".custom-option").on("click", function() {
                      $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
                      $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
                      $(this).addClass("selection");
                      $(this).parents(".custom-select").removeClass("opened");
                      $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
                      $('option[selected=selected').removeAttr('selected');
                      $('option[value=' + $(this).attr("value") + ']').attr('selected','selected');
                    });



        })
    </script>


@endsection
