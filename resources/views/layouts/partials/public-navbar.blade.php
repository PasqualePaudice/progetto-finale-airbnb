{{-- qui inserisco la navbar con la parte animata--}}
<div class="wrapper">
    <header>
      <nav>
        <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
        </div>
        
        <div class="logo">
          <a href="#"><img src="{{ asset("img/LogoBoolBnB.png")  }}" alt="logo boolBnB"/></a>
          
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
      
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
              <div class="carousel-item active slide-one">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-6">
                              <h1 class="animated fadeInLeft delay-1s">Case vacanze, alloggi, esperienze e luoghi</h1>
                              <p class="animated lightSpeedIn delay-2s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, quos, voluptate vel
                                  numquam voluptas, incidunt dicta voluptatum perferendis sit odio autem aliquid qui!
                                  Quasi alias perferendis quisquam, error dolorum neque.</p>
                              <button type="button" class="animated jackInTheBox delay-5s">Scopri di piu'</button>
                          </div>
                          <div class="col-md-6">
                              <div class="img-box">
                                  <img src="{{ asset("images/pic-1.png") }}" class="pic-one animated zoomIn delay-1s">
                                  <img src="{{ asset("images/pic-2.png") }}" class="pic-two animated fadeInLeft delay-4s">
                                  <img src="{{ asset("images/pic-4.png") }}" class="pic-four animated fadeInDown delay-3s">
                                  <img src="{{ asset("images/pic-6.png") }}" class="pic-six animated jackInTheBox delay-5s">
                                  <img src="{{ asset("images/img-1.png") }}" class="img-one animated zoomIn delay-1s">
                                  <img src="{{ asset("images/img-2.png") }}" class="img-two animated fadeInLeft delay-4s">
                                  <img src="{{ asset("images/img-3.png") }}" class="img-three animated fadeInUp delay-3s">
                                  <img src="{{ asset("images/img-4.png") }}" class="img-four animated fadeInDown delay-3s">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    </header>
  </div>