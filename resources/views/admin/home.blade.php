@extends('layouts.publicAdmin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">

          <h2 class="card-title">Benvenuto {{Auth::user()->name}}</h2>
          <p class="card-text">Per vedere i tuoi appartamenti premi il bottone!</p>
          <a class="btn btn-info" href="{{route('admin.apartments.index')}}">Lista appartamenti</a>

        </div>
    </div>
</div>
@endsection
