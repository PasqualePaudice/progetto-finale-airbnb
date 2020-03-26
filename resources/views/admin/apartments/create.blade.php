@extends('layouts.publicAdmin')

@section('content')



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">




            <form class="" action="{{ route('admin.apartments.store', ['user_id' => Auth::user()->id])}}" method="post" enctype="multipart/form-data" >


                @csrf
                <div class="form-group">
                    <label for="title">Titolo inserzione</label>
                    <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="stanze">Numero Stanze</label>
                    <input id="stanze" class="form-control" type="text" name="stanze" value="{{ old('stanze') }}">
                </div>

                <div class="form-group">
                    <label for="posti_letto">Letti</label>
                    <input id="posti_letto" class="form-control" type="text" name="posti_letto" value="{{ old('posti_letto') }}">
                </div>

                <div class="form-group">
                    <label for="bagni">Bagni</label>
                    <input id="bagni" class="form-control" type="text" name="bagni" value="{{ old('bagni') }}">
                </div>

                <div class="form-group">
                    <label for="metri_quadri">Metri Quadri</label>
                    <input id="metri_quadri" class="form-control" type="text" name="metri_quadri" value="{{ old('metri_quadri') }}">
                </div>

                <div class="form-group">
                    <label for="indirizzo">via</label>
                    <input id="indirizzo" class="form-control" type="text" name="indirizzo" value="{{ old('indirizzo') }}">
                </div>

                <div class="form-group">
                    <label for="city">città</label>
                    <input id="city" class="form-control" type="text" name="city" value="{{ old('city') }}">
                </div>

                <div class="form-group">
                    <label for="state">Stato</label>
                    <input id="state" class="form-control" type="text" name="state" value="{{ old('state') }}">
                </div>

                <div class="form-group">
                    <label for="cap">CAP</label>
                    <input id="cap" class="form-control" type="text" name="cap" value="{{ old('cap') }}">
                </div>

                <div class="form-group">
                    <label for="descrizione_appartamento">Descrizione</label>

                    <textarea class="form-control
                    " id="descrizione_appartamento" name="descrizione_appartamento" rows="8" >{{old('descrizione_appartamento')}}</textarea>
                </div>

                <div class="form-group">

                    <label for="cover_image">Immagine di copertina</label>
                    <input type="file"  class="form-control-file" id="cover_image" name="cover_image">

                </div>

                <div class="form-group">

                    @if($services->count() > 0)
                        <p>Seleziona i servizi</p>
                        @foreach ($services as $service)

                            <label for="service_{{ $service->id }}">

                                <input id="service_{{ $service->id }}" type="checkbox" name="service_id[]" value="{{ $service->id }}"
                                {{in_array($service->id, old('service_id', array())) ? 'checked' : ''}} >

                                {{ $service->service_name }}
                            </label>
                        @endforeach
                    @endif

                </div>





                <button class="btn btn-warning mb-5" type="submit" name="button">CREA</button>


            </form>
        </div>
    </div>
</div>
@endsection
