@extends('layouts.publicAdmin')

@section('content')

    <div id="registerCss" class="session">
        <div class="left">

        </div>
        <form method="POST" action="{{ route('register') }}" class="log-in" autocomplete="off">
          @csrf
          <h4>Siamo <span>BoolBnB</span></h4>
          <p class="mw-100">Registrati e vivi un'esperienza unica</p>

          <div class="floating-label">
            <input id="name" type="text" placeholder="Nome" class="form-control @error('name') is-invalid @enderror ml-0" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <label for="name" class="pl-0">{{ __('Nome') }}</label>
          </div>

          <div class="floating-label">
            <input id="lastname" type="text" placeholder="Cognome" class="form-control @error('lastname') is-invalid @enderror ml-0" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <label for="lastname" class="pl-0">{{ __('Cognome') }}</label>
          </div>

          <div class="floating-label">
            <input id="dateOfBirth" type="date" placeholder="Data di Nascita" class="form-control @error('dateOfBirth') is-invalid @enderror ml-0" name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autocomplete="dateOfBirth" autofocus>
                @error('dateOfBirth')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <label for="dateOfBirth" class="pl-0">{{ __('Data di Nascita') }}</label>
          </div>


          <div class="floating-label">
            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror ml-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="email" class="pl-0">Email:</label>
          </div>


          <div class="floating-label">
            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror ml-0" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="password" class="pl-0">Password:</label>
          </div>


          <div class="floating-label">
            <input id="password-confirm" placeholder="Conferma Password" type="password" class="form-control ml-0" name="password_confirmation" required autocomplete="new-password">
            <label for="password-confirm" class="pl-0">{{ __('Conferma Password') }}</label>
          </div>


          <button type="submit">Registrati</button>

        </form>

    </div>

{{--
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrazione') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>






                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">{{ __('Data di nascita') }}</label>

                            <div class="col-md-6">

                                <input id="dateOfBirth" type="date"  class="form-control @error('dateOfBirth') is-invalid @enderror"
                                     name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autocomplete="dateOfBirth" autofocus >

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>






                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
