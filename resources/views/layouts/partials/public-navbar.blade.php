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
            @if (Route::has('login'))
                {{-- <div class="top-right links"> --}}
                    @auth

                      @if (Request::url() != url('/admin'))
                        <li><a href="{{ url('/admin') }}">Vai al tuo profilo</a></li>
                      @endif

                        {{-- inseriamo qua logout --}}
                        <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Esci
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                    @else
                    <li><a href="{{ route('login') }}">Accedi</a></li>

                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Registrati</a></li>
                        @endif
                    @endauth
                {{-- </div> --}}
            @endif
          </ul>
        </div>
      </nav>


    </header>


  </div>
