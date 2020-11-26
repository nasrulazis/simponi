
<header id="header" class="relative-top">
    <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="/pembeli" class="text-success">Simponi</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>          
          @guest
          <li><a href="{{route('halamanLogin')}}" class="btn btn-outline-success rounded-pill px-4 text-success scrollto">Login</a></li>
          <li><a href="{{route('halamanDaftar')}}" class="btn btn-success rounded-pill px-4 text-white scrollto">Daftar</a></li>
          
          @else
          <div class="dropdown d-flex align-items-center">
            <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa-stack" style="vertical-align: middle;">
              <!-- <i class="far fa-circle fa-stack-2x fa-xs"></i> -->
              <i class="fas fa-shopping-cart fa-stack-1x fa-lg" ></i>
            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <p class="dropdown-item m-0" href="#">Barang1 10</p>
              <p class="dropdown-item m-0" href="#">Barang2 10</p>
              <p class="dropdown-item m-0" href="#">Barang3 10</p>
              
              
            </div>
          </div>            
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <!-- <span class="profile-ava">
                                    <img alt="" src="img/avatar1_small.jpg">
                                </span> -->
                                <span class="username">{{ Auth::user()->nama }}</span>
                                <b class="caret"></b>
                            </a>
                <ul class="dropdown-menu extended logout">
                  <div class=""></div>
                  <li class="dropdown-item">
                    <a href="{{route('profil')}}"><i class="icon_profile"></i> My Profile</a>
                  </li>
                  <li class="dropdown-item">
                    <a href="/keluar"><i class="icon_clock_alt"></i> Logout</a>
                  </li>
                  
                  
                </ul>
              </li>
          @endguest
        </ul>

      </nav><!-- .nav-menu -->


    </div>
  </header><!-- End Header -->
