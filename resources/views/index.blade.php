@extends('layout/main')
@section('title','Simponi')

@section('container')
    <section id="hero" class="d-flex align-items-center mb-0">
        <div class="container">
            <h1 class="text-center">SIMPONI</h1>
        </div>
    </section>
    
    <div class="position-fixed button-hover d-flex align-items-end flex-column" style="bottom: 45px; right: 24px; height:45px; width:45px; z-index:1;">
        <a class=" btn-lg rounded-circle btn-success btn d-flex align-items-center shadow h-100" id="button-hover" onclick="showMessage()"><i class="fas fa-comment"></i></a>           
    </div>

    <div class="card position-fixed ml-4" id="message" style="opacity:0; bottom: 100px; right: 24px; z-index:1;">
      <div class="card-header">
        <h5>
        Contact Simponi
        </h5>
      </div>
      <div class="card-body" style="width:30vw;">
        <div class="border p-2 mb-3 col-12" style="overflow-y:auto; scroll-snap-align: end; height:200px;">
            <?php 
            $count=0;
            
            ?>
            @if($chat->isEmpty())
            <p>Chat dengan Simponi</p>
            @else
        @foreach($chat as $key=>$data)

          @if($data->status==2)
            <?php 
            $count+=1;
            ?>
            @if($count<=1)
          <!-- repet  -->
          <div class="d-flex m-0">
            <div class="d-flex flex-column border rounded  py-3 px-4 border-muted col-8 mb-2" disabled>
              <div id="user" class="text-success"><b>Simponi</b></div>
              <div id="chat" class="text-secondary">{{$data->tulis_pesan}}</div>
            </div>
          </div>
            @else
          <div class="d-flex m-0">
            <div class="d-flex flex-column border rounded  py-3 px-4 border-muted col-8 mb-2" disabled>              
              <div id="chat" class="text-secondary">{{$data->tulis_pesan}}</div>
            </div>
          </div>
            @endif
          @else
          <?php 
            $count=0;
            ?>

          <!-- 1 -->
          <div class="d-flex justify-content-end m-0">
            <div class="d-flex flex-column border rounded bg-success text-white py-2 px-4 border-success col-8 mb-2" disabled>              
              <div id="chat" class="text-white">{{$data->tulis_pesan}}</div>
            </div>            
          </div>
          <!-- 2 -->
          @endif
        @endforeach
            @endif
        </div>
        <form action="{{route('chat')}}" method="post">
        <div class="d-flex">
        @csrf
        <input type="text" class="form-control" name="chat">
        @if(Auth::check())
        <button class="btn btn-outline-success ml-2" type="submit"><i class="fas fa-location-arrow" ></i></button>        
        @else
        <button class="btn btn-outline-success ml-2" type="submit"><i class="fas fa-location-arrow" ></i></button>        
        @endif
        </div>
        </form>
      </div>
    </div>

    <!-- ======= Katalog Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <!-- <div class="section-title mb-5 mt-0">
          <h2>Katalog</h2>
        </div> -->

        <div class="row">
          @foreach($katalog as $katalog_tumbuhan)
            @if($katalog_tumbuhan->stok>0)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 justify-content-center">
            <a href="/katalog?id={{$katalog_tumbuhan->id}}">
              <div class="icon-box" style="width:100%">
                <div class="image">
                  @if(!empty($katalog_tumbuhan->gambar))

                  <img src="images/{{$katalog_tumbuhan->gambar}}" alt="">
                  @else
                  <img src="assets/img/2864437_86b5f81d-5474-49d4-8241-8954021af099_706_706.png" alt="">
                  @endif
                </div>
                <div class="deskripsi">
                <h4>{{$katalog_tumbuhan->nama_tanaman}}</h4>
                <p>Rp<?php
                $number=$katalog_tumbuhan->harga;
                echo number_format(floatval($number))?></p>
                </div>
              </div>
              </a>
            </div>
            @endif
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

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5 shadow p-3 mb-5 mt-4 bg-white rounded">
            <h3>APA ITU SIMPONI?</h3>
            <p>"Simponi merupakan singkatan dari Sistem Informasi Hidroponik. Dilihat dari namanya yaitu hidroponik, simponi ini merupakan sistem yang dibuat guna mempermudah petani tanaman hidroponik dalam mengelola tanamannya. Dalam sistem ini terdapat fitur pencatatan faktor-faktor yang mempengaruhi tanaman hidproponik dalam masa pertumbuhannya."</p>
            <p>"Karena mitra yang bekerja sama dengan kami menemui kendala salah satunya adalah waktu panen yang berbeda dalam satu kali penanaman. Kemudian terdapat fitur penjualan produk tanaman hidroponik. Fitur ini berguna untuk membantu mitra kami dalam hal memasarkan produk tanaman hidroponik. Kemudian terdapat fitur melihat rekap data penjualan dari hasil penjualan produk tanaman hidroponik."</p>

            <!-- <div class="icon-box">
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div> -->

            

          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->
    <script>
    function showMessage() {
      if(document.getElementById("message").style.opacity == 0){
      document.getElementById("message").style.opacity = 1;
      }else{
      document.getElementById("message").style.opacity = 0;
      }
    }
    </script>
@endsection
