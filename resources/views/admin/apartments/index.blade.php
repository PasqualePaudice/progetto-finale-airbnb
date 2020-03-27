@extends('layouts.publicAdmin')

@section('content')


  <div class="container mt-5">
      @if (session('message'))
          <div class="row text-center">
              <div class="col-sm-12">
                  <div class="alert alert-success">
                      {{ session('message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              </div>
          </div>
      @endif
    <div class="row">
      <div class="col-sm-6">
        <h1>Lista appartamenti</h1>
      </div>
      <div class="col-sm-6 text-right">
        <a class="btn btn-success mt-2" href="{{ route('admin.apartments.create') }}">Aggiungi stanza</a>
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
            @forelse($apartments as $apartment)

              <tr>
                <td class="p-0 py-4">{{$apartment->title}}</td>
                <td class="p-0 py-4">{{$apartment->indirizzo}} </td>

                <td class="p-0 py-3">



                  <a class="btn btn-info mt-1" href="{{route('admin.apartments.show',['apartment' => $apartment->id])}}">Visualizza</a>
                  <a class="btn btn-warning mt-1" href="{{route('admin.apartments.edit',['apartment' => $apartment->id])}}">Modifica</a>
                  <a class="btn btn-secondary mt-1" href="{{route('admin.visibility',['apartment' => $apartment->id])}}">
                      {{($apartment->visible == 1) ? 'Disattiva' : 'Attiva' }}
                  </a>
                  <form class="d-inline-block" action=" {{route('admin.apartments.destroy',['apartment' => $apartment->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger d-inline-block mt-1" type="submit" value="Cancella">
                  </form>
                  @php
                      $apartment_sponsors = DB::table('apartment_sponsor')->where('apartment_id', $apartment->id)->where('end_sponsor', '>=' , $now )->get()
                  @endphp

                  @if (count($apartment_sponsors))
                      <p class="btn" href="#">Sponsorizzato fino al:  {{$apartment_sponsors[0]->end_sponsor}} </p>



                  @else
                      <a class="btn btn-success mt-1" href="{{ route('admin.apartments.sponsor',['apartment' => $apartment->id]) }}">
                      Sponsorizza</a>

                  @endif


                  {{-- @foreach ($pivots as $pivot)
                      @if ($pivot->apartment_id == $apartment->id)


                      @endif --}}

                  {{-- @endforeach --}}


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
