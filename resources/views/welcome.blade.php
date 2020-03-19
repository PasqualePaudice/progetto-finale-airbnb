<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
        
        <title>Laravel</title>
        
        
        
        
        
    </head>
    <body>
      <a class="btn btn-info" href="{{route('dettagli',['apartment' => '3'])}}">Visualizza</a>
        <div class="flex-center position-ref full-height">
            

            <div class="content">

                @include('layouts.partials.public-navbar')
                @yield('content')
                @include('layouts.partials.sectionHome')
                @yield('content')


                
            </div>
        </div>
    </body>
</html>
