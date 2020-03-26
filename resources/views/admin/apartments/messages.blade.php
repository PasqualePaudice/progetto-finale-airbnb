@extends('layouts.publicAdmin')

@section('content')



<div class="container mt-5">
        <div class="row">
            <div class="col-sm-8">
                <h1>Messaggi ricevuti per l'appartamento {{$apartment->id}}</h1>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-success mt-2" href="{{route('admin.apartments.show',['apartment' => $apartment->id])}}">Torna alla pagina dettagli</a>
            </div>

        </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Ricevuto da</th>
                  <th>Ricevuto il</th>
                  <th>Azioni</th>
                </tr>
              </thead>
              <tbody>
                @forelse($messages as $message)
                    @if ($message->read == 0)
                        <tr>
                            <th>{{$message->email}}</th>
                            <th>{{$message->created_at}}</th>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.apartments.messages.show',['apartment' => $apartment, 'message' => $message])}}">Visualizza</a>
                                <form class="d-inline-block" action="{{route('admin.apartments.messages.destroy',['apartment' => $apartment, 'message' => $message])}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <input class="btn btn-danger d-inline-block" type="submit" value="Elimina">
                                </form>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>{{$message->email}}</td>
                            <td>{{$message->created_at}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.apartments.messages.show',['apartment' => $apartment, 'message' => $message])}}">Visualizza</a>
                                <form class="d-inline-block" action="{{route('admin.apartments.messages.destroy',['apartment' => $apartment, 'message' => $message])}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <input class="btn btn-danger d-inline-block" type="submit" value="Elimina">
                                </form>
                            </td>
                        </tr>
                    @endif
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
