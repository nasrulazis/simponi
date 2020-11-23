<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include ('layout.header')
<body>
  <div id="app">
        <!-- Header -->
    <header id="header" class="relative-top">
        <div class="container d-flex align-items-center">

          <h1 class="logo mr-auto"><a href="/" class="text-success">Simponi</a></h1>
          <nav class="nav-menu d-none d-lg-block">
            <ul>          
              @guest
              <li><a href="{{route('halamanLogin')}}" class="btn btn-outline-success rounded-pill px-4 text-success scrollto">Login</a></li>
              <li><a href="{{route('halamanDaftar')}}" class="btn btn-success rounded-pill px-4 text-white scrollto">Daftar</a></li>
              
              @else
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
                      <li>
                        <a href="#"><i class="icon_profile"></i> My Profile</a>
                      </li>
                      <li>
                        <a href="/keluar"><i class="icon_clock_alt"></i> Logout</a>
                      </li>
                      
                      
                    </ul>
                  </li>
              @endguest
            </ul>

          </nav><!-- .nav-menu -->


        </div>
  </header><!-- End Header -->
        <main class="py-4">
            @yield('content')
        </main>
  </div>
</body>
</html>
