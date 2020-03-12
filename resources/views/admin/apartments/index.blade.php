@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Lista appartamenti</h1>
      </div>
      <div class="col-sm-6">
        <a class="btn btn-success" href="{{ route('admin.apartments.create') }}">Aggiungi stanza</a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <table class="table">
          <thead>
            <tr>
              <th>Titolo</th>
              <th>Indirizzo</th>
              <th>Azioni</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($apartments as $apartment)
              <tr>
                <td>{{$apartment->title}}</td>
                <td>{{$apartment->indirizzo}}</td>
                <td>
                  <a class="btn btn-info" href="{{route('admin.apartments.show',['apartment' => $apartment->id])}}">Visualizza</a>
                  <a class="btn btn-warning" href="{{route('admin.apartments.edit',['apartment' => $apartment->id])}}">Modifica</a>
                  <form class="d-inline-block" action=" {{route('admin.apartments.destroy',['apartment' => $apartment->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger d-inline-block" type="submit" value="Cancella">
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3">Non hai ancora registrato alcun appartamento</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
