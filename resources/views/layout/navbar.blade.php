
<header id="header" class="relative-top">
    <div class="container d-flex align-items-center">

    <h1 class="logo mr-auto"><a href="/pembeli" class="text-success">Simponi</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>          
          @guest
          <li><a href="{{route('halamanLogin')}}" class="btn btn-outline-success rounded-pill px-4 text-success scrollto">Login</a></li>
          <li><a href="{{route('halamanDaftar')}}" class="btn btn-success rounded-pill px-4 text-white scrollto">Daftar</a></li>
          
          @else
          <div class="dropdown d-flex align-items-center" >
          <?php
          $pemesanan = \App\pemesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
          $pemesananpembayaran = \App\pemesanan::where('user_id', Auth::user()->id)->where('status',1)->get();          
          $pemesanansemua = \App\pemesanan::where('user_id', Auth::user()->id)->get();
          $total_pembayaran=count($pemesananpembayaran);
          if(!empty($pemesanan)){
            $total_pemesanan=$pemesanan->total_harga;
            $detail=\App\detailpemesanan::where('pesanan_id',$pemesanan->id)->get();
          }          
          
          $katalog=\App\katalog::All();
          ?>
            <a class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa-stack" style="vertical-align: middle;">
              <!-- <i class="far fa-circle fa-stack-2x fa-xs"></i> -->
              <i class="fas fa-shopping-cart fa-stack-1x fa-lg" ></i>
              @if(!empty($pemesanan))
              <span class="badge badge-success" >{{count($detail)}}</span>
              @endif
            </span>
            </a>
            
            <div class="dropdown-menu dropdown-menu-right" style="width:250px" aria-labelledby="dropdownMenuButton">
            

            <p class="dropdown-item m-0 d-flex justify-content-between font-weight-bold">Keranjang</p>
            @if(!empty($pemesanan))
            
            @foreach($detail as $key => $data)
              <?php
              $katalog=\App\katalog::where('id',$data->katalog_id)->first();
              $katalognama=$katalog->nama_tanaman;              
              ?>
              <p class="dropdown-item m-0 d-flex justify-content-between" href="#">&times {{$data->jumlah}} {{$katalognama}} <b>{{number_format(floatval($data->harga))}}</b> </p>
            @endforeach
              <p class="dropdown-item m-0 d-flex justify-content-between" href="#">Total <b> Rp{{number_format(floatval($total_pemesanan))}}</b></p>
              <p class="dropdown-item m-0 d-flex justify-content-end"><a  href="{{route('checkoutpemesanan')}}"><button class="btn btn-success">CheckOut</button></a></b></p>
              @endif

              
            </div>
            <div class="dropdown">
            <a class="" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa-stack" style="vertical-align: middle;">
              <!-- <i class="far fa-circle fa-stack-2x fa-xs"></i> -->
              <i class="fas fa-bell fa-stack-1x fa-lg" ></i>
              @if(!empty($pemesananpembayaran))
              <span class="badge badge-success">
              {{count($pemesananpembayaran)}}              
              </span>
              @endif              
            </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="width:250px" aria-labelledby="dropdownMenuButton1">
              <ul>
                <li>
                <a href="{{route('pembayaran')}}">
                  <div class="d-flex justify-content-between">                
                    <p class="dropdown-item m-0 d-flex align-items-center font-weight-bold">
                    <i class="fas fa-wallet mr-2"></i>
                      Pembayaran
                    </p>
                    @if($total_pembayaran>0)
                    <span class="d-flex align-items-center mr-2 font-weight-bold">({{$total_pembayaran}})</span>
                    @endif
                  </div>
                </a>
                <a href="{{route('cekpemesanan')}}">
                  <div class="d-flex justify-content-between">                
                    <p class="dropdown-item m-0 d-flex align-items-center font-weight-bold">
                      <i class="fas fa-file-invoice mr-2"></i>
                      Cek Pemesanan
                    </p>                    
                  </div>
                </a>
                </li>
              </ul>
            </div>
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
