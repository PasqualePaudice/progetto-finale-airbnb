<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>404 - Pagina non trovata</title>
    </head>
    <body id="errore">
        <section class="error-container">
              <span>4</span>
              <span><span class="screen-reader-text">0</span></span>
              <span>4</span>
        </section>
        <div class="link-container">
              <a href="{{route('publicHome')}}" class="more-link">Torna alla Home</a>
        </div>
    </body>
</html>
