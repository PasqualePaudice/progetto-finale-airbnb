{{-- qui inserisco la navbar con la parte animata--}}
<div class="wrapper">
    <header>
      <nav id="prova">
        <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
        </div>

        <div class="logo" style="display: flex; align-items: center; height: 64px; margin: 0">
          <a href="{{ route('publicHome')}}" style="margin-top: 6px; margin-left: 14px; margin-right: 14px;"><img src="{{ asset("img/LogoBoolBnB.png")  }}" alt="logo boolBnB"/></a>

              {{-- <div class="search">
                  <div class="search-box">
                      <input type="text">
                      <span></span>
                  </div>
              </div> --}}
              <div class='barra_ricerca_tomtom'></div>
        </div>

        <div class="menu">
          <ul>
            <li><a href="#">Italiano</a></li>
            <li><a href="#">€ EUR</a></li>
            <li><a href="#">Offri una Casa</a></li>
            <li><a href="#">Aiuto</a></li>
            @if (Route::has('login'))
                {{-- <div class="top-right links"> --}}
                    @auth
                        <li><a href="{{ url('/admin') }}">Home</a></li>
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                {{-- </div> --}}
            @endif
          </ul>
        </div>
      </nav>


    </header>


  </div>

{{-- <div class="wrapper">
  <header>
    <nav>
      <div class="menu-icon">
        <i class="fa fa-bars fa-2x"></i>
      </div>

      <div class="logo">
        <a href="#"><img src="{{asset('img/LogoBoolBnB.png')}}" alt="logo boolBnB"/></a>

            <div class="search">
                <div class="search-box">
                    <input type="text">
                    <span></span>
                </div>
            </div>
      </div>

      <div class="menu">
        <ul>
          <li><a href="#">Italiano</a></li>
          <li><a href="#">€EUR</a></li>
          <li><a href="#">Offri una Casa</a></li>
          <li><a href="#">Aiuto</a></li>
          <li><a href="#">Registrati</a></li>
          <li><a href="#">Accedi</a></li>
        </ul>
      </div>
    </nav>
  </header>
</div> --}}
