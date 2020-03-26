@extends('layouts.publicAdmin')

@section('content')



<div class="container mt-5">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <form class="" action="{{ route('admin.apartments.update',['apartment' => $apartment->id ])}}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Titolo inserzione</label>
                    <input id="title" class="form-control" type="text" name="title" value="{{ old('title', $apartment->title) }}">
                </div>

                <div class="form-group">
                    <label for="stanze">Numero Stanze</label>
                    <input id="stanze" class="form-control" type="text" name="stanze" value="{{ old('stanze', $apartment->stanze) }}">
                </div>

                <div class="form-group">
                    <label for="posti_letto">Letti</label>
                    <input id="posti_letto" class="form-control" type="text" name="posti_letto" value="{{ old('posti_letto', $apartment->posti_letto) }}">
                </div>

                <div class="form-group">
                    <label for="bagni">Bagni</label>
                    <input id="bagni" class="form-control" type="text" name="bagni" value="{{ old('bagni', $apartment->bagni) }}">
                </div>

                <div class="form-group">
                    <label for="metri_quadri">Metri Quadri</label>
                    <input id="metri_quadri" class="form-control" type="text" name="metri_quadri" value="{{ old('metri_quadri', $apartment->metri_quadri) }}">
                </div>

                <div class="form-group">
                    <label for="indirizzo">Via</label>
                    <input id="indirizzo" class="form-control" type="text" name="indirizzo" value="{{ old('indirizzo', $apartment->indirizzo) }}">
                </div>

                <div class="form-group">
                    <label for="city">Città</label>
                    <input id="city" class="form-control" type="text" name="city" value="{{ old('city',$apartment->city) }}">
                </div>

                <div class="form-group">
                    <label for="state">Stato</label>
                    <input id="state" class="form-control" type="text" name="state" value="{{ old('state',$apartment->state) }}">
                </div>

                <div class="form-group">
                    <label for="cap">CAP</label>
                    <input id="cap" class="form-control" type="text" name="cap" value="{{ old('cap',$apartment->cap) }}">
                </div>

                <div class="form-group">
                    <label for="descrizione_appartamento">Descrizione</label>

                    <textarea class="form-control
                    " id="descrizione_appartamento" name="descrizione_appartamento" rows="8" >{{old('descrizione_appartamento', $apartment->descrizione_appartamento)}}</textarea>
                </div>

                <div class="form-group">

                    <label for="cover_image">Immagine di copertina</label> <br>
                    @if ($apartment->cover_image)
                      <img src="{{asset('storage/' . $apartment->cover_image)}}" alt="" style="width:200px">
                    @endif
                    <input type="file"  class="form-control-file mt-2" id="cover_image" name="cover_image"  >

                </div>

                @if ($services->count() > 0)

                    <div class="from-group">

                        <p>Seleziona i servizi:</p>

                        {{-- @foreach ($services as $service)
                         <label for="service_{{$service->id}}">
                            <input id="tag_{{$service->id}}" type="checkbox" name="service_id[]" value="{{$service->id}}"
                            {{ $apartment->services->contains($service) ? 'checked' : ''}}>
                            {{ $service->service_name}}
                        </label>
                        @endforeach --}}

                        @foreach ($services as $service)

                            <label class="mr-3">

                                <input type="checkbox" name="service_id[]" value="{{$service->id}}"
                                 @if ($errors->any())
                                      {{in_array($service->id, old('service_id', array())) ? 'checked' : ''}}
                                 @else
                                     {{$apartment->services->contains($service) ? 'checked' : ''}}
                                 @endif
                                 >
                                    {{$service->service_name}}
                            </label>
                         @endforeach
                    </div>

                @endif

                <button class="btn btn-warning" type="submit" name="button">Modifica</button>


            </form>
        </div>
    </div>
</div>
@endsection
