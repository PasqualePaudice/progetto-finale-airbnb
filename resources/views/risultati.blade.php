@extends('layouts.public')

@section('content')
    <main>
        <div class="container">
            <div class="row" id="servizi">
                @foreach ($services as $service)
                    <label for="{{$service->service_name}}">{{$service->service_name}}</label>
                    <input type="checkbox" id="{{$service->service_name}}" name="servizi" value="{{$service->service_name}}">
                @endforeach
            </div>
        </div>
        <div class="section">
            <div class="row">

                @foreach ($apartments as $apartment)
                    @if ($apartment != null)


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

    </main>

    <script type="text/javascript">

    $(document).ready(function(){
        $('input[type=checkbox]').on("click", function() {
            var array = [];
            $('#servizi input').each(function(){
                if($(this).prop("checked")) {
                    var thisValue = $(this).val();
                    var new_item = 'service=' + thisValue;
                    array.push(new_item);
                }
            });
            var new_querie = array.join('&');
            console.log(new_querie);
            $.ajax ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url : '{{route('cerca')}}',
                data: new_querie,
                success: function(response) {
                    console.log(response)
                },
                error: function(response) {
                    console.log(response)
                }
            })
        })
    });
    </script>


@endsection
