@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <h1>Messaggi ricevuti per l'appartamento {{$apartment->id}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Ricevuta da</th>
                  <th>Ricevuta il</th>
                  <th>Contenuto</th>
                </tr>
              </thead>
              <tbody>
                @forelse($messages as $message)

                  <tr>
                    <td>{{$message->email}}</td>
                    <td>{{$message->created_at}} </td>
                    <td>{{$message->text}}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3">La tua casella di posta è vuota</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
