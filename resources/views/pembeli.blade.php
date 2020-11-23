@extends('layout/main')
@section('title','Simponi')
@section('navbar')
    <h1 class="logo mr-auto"><a href="/pembeli" class="text-success">Simponi</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>          
          <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <!-- <span class="profile-ava">
                                  <img alt="" src="img/avatar1_small.jpg">
                              </span> -->
                              <span class="username">Setting</span>
                              <b class="caret"></b>
                          </a>
              <ul class="dropdown-menu extended logout">
                <div class=""></div>
                <li>
                  <a href="route{{'profil'}}"><i class="icon_profile"></i> My Profile</a>
                </li>
                <li>
                  <a href="/keluar" class=" btn-light">Log Out</a>
                </li>
                
                
              </ul>
            </li>
        </ul>
      </nav><!-- .nav-menu -->
    
@endsection
@section('container')
    <section id="hero" class="d-flex align-items-center mb-0">
        <div class="container">
            <h1>Selamat Datang!</h1>
            <h2>Cari produk hasil hidroponik disekitarmu!</h2>
            <a href="#services" class="btn-get-started scrollto">Cari produk</a>
        </div>
    </section>
    
    <!-- ======= Katalog Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title mb-5 mt-0">
          <h2>Katalog</h2>
        </div>

        <div class="row">
          @foreach($katalog as $katalog_tumbuhan)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box" style="width:100%">
                <div class="icon"><i class="icofont-heartbeat"></i></div>
                <h4><a href="/katalogPembeli?id={{$katalog_tumbuhan->id}}">{{$katalog_tumbuhan->nama_tanaman}}</a></h4>
                <p>Harga : {{$katalog_tumbuhan->harga}}</p>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch">
            
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>About us</h3>
            <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Dine Pad</a></h4>
              <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
            </div>

          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->
@endsection
