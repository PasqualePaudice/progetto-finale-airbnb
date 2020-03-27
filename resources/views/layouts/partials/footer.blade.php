<footer>
      <div class="container">
        <div class="row ml-0">
          <div class="footer-top col-sm-12 d-flex flex-column align-items-center">
            <h1>BoolBnB</h1>
            <div class="icone">
              <i class="fab fa-facebook-square fa-2x"></i>
              <i class="fab fa-twitter-square fa-2x"></i>
              <i class="fab fa-instagram fa-2x"></i>
              <i class="fab fa-youtube-square fa-2x"></i>
            </div>

          </div>
          <div class="footer-bottom col-sm-12 d-flex justify-content-center">
            <div class="footer-link">
              <a href="{{ route('publicHome')}}">Home</a>
              <span>|</span>
              @if (Route::has('login'))
                      @auth
                          <a href="{{ url('/admin') }}">Vai al tuo profilo</a>
                          <span>|</span>
                          <a href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              Esci
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>

                      @else
                      <a href="{{ route('login') }}">Accedi</a>
                      <span>|</span>
                          @if (Route::has('register'))
                          <a href="{{ route('register') }}">Registrati</a>
                          @endif
                      @endauth
                  {{-- </div> --}}
              @endif
            </div>

          </div>
        </div>
      </div>

    </footer>
