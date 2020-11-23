@extends('layout/main')
@section('title','Simponi')

@section('container')
    <section id="hero" class="d-flex align-items-center mb-0">
        <div class="container">
            <h1 class="text-center">SIMPONI</h1>
        </div>
    </section>
    
    <!-- ======= Katalog Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <!-- <div class="section-title mb-5 mt-0">
          <h2>Katalog</h2>
        </div> -->

        <div class="row">
          @foreach($katalog as $katalog_tumbuhan)
          
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 justify-content-center">
            <a href="/katalog?id={{$katalog_tumbuhan->id}}">
              <div class="icon-box" style="width:100%">
                <div class="image">
                  <img src="assets/img/2864437_86b5f81d-5474-49d4-8241-8954021af099_706_706.png" alt="">
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
            <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.

              Remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."</p>
            <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.

              Remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."</p>

            <!-- <div class="icon-box">
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div> -->

            

          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->
@endsection
