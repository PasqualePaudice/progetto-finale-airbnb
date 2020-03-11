@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
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
                    <label for="indirizzo">Indirizzo</label>
                    <input id="indirizzo" class="form-control" type="text" name="indirizzo" value="{{ old('indirizzo', $apartment->indirizzo) }}">
                </div>

                <div class="form-group">
                    <label for="descrizione_appartamento">Descrizione</label>

                    <textarea class="form-control
                    " id="descrizione_appartamento" name="descrizione_appartamento" rows="8" >{{old('descrizione_appartamento', $apartment->descrizione_appartamento)}}</textarea>
                </div>

                <div class="form-group">

                    <label for="cover_image">Immagine di copertina</label>
                    @if ($apartment->cover_image)
                      <img src="{{asset('storage/' . $apartment->cover_image)}}" alt="">
                    @endif
                    <input type="file"  class="form-control-file" id="cover_image" name="cover_image">

                </div>

                <button class="btn btn-warning" type="submit" name="button">Modifica</button>


            </form>
        </div>
    </div>
</div>
@endsection
