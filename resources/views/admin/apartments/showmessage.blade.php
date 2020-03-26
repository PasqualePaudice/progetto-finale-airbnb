@extends('layouts.publicAdmin')


@section('content')
  <div class="container mt-5">
      <div class="row">
          <div class="col-sm-12">
              <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{$message->email}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Ricevuto il: {{$message->created_at}}</h6>
                    <p class="card-text">{{$message->text}}</p>
                    <a class="btn btn-success" href="{{ route('admin.apartments.messages', ['apartment' => $apartment->id])}}" class="card-link">Torna alla casella messaggi</a>
                  </div>
              </div>
          </div>
      </div>
  </div>





@endsection
