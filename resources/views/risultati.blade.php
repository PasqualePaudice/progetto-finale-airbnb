@extends('layouts.public')

@section('content')
    <main>
        <div class="section">
            <div class="row">
                @foreach ($apartments as $apartment)
                    <div class=" col-xl-3 col-lg-4 col-md-6 mb-4" >
                        <a id="a" href="{{route('dettagli',['apartment'=>$apartment->id])}}">
                        </a>
                                <div class="bg-white rounded shadow-sm" >
                                    <img src="{{asset('storage/'.$apartment->cover_image)}}" alt="" class="img-fluid card-img-top" >
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

                @endforeach


            </div>
        </div>

    </main>


@endsection
