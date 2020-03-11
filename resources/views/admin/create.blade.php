@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="" action="{{ route('admin.store',['user_id' => Auth::user()->id ])}}" method="post">
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
                    <label for="indirizzo">Indirizzo</label>
                    <input id="indirizzo" class="form-control" type="text" name="indirizzo" value="{{ old('indirizzo') }}">
                </div>

                <div class="form-group">
                    <label for="descrizione_appartamento">Descrizione</label>

                    <textarea class="form-control
                    " id="descrizione_appartamento" name="descrizione_appartamento" rows="8" ></textarea>
                </div>





                <button class="btn btn-warning" type="submit" name="button">CREA</button>


            </form>
        </div>
    </div>
</div>
@endsection
