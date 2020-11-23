@extends('layout/main')
@section('title','Simponi')
@section('container')
<section id="services" class="services">
    <div class="container shadow p-4">
        <div class="row my-4">
            @foreach($katalog as $katalog_tumbuhan)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 justify-content-center mb-4">
              <div class="icon-box" style="width:100%">
                <div class="image shadow">
                  <img src="assets/img/2864437_86b5f81d-5474-49d4-8241-8954021af099_706_706.png" alt="">
                </div>
              </div>
            </div>
                <div class="description col-lg-6">
                <h1 class="font-weight-bold mb-3">{{$katalog_tumbuhan->nama_tanaman}}</h1>
                  <table id="tabelkatalog">
                    
                    
                    <tr class="d-flex">
                      <td class="col-2"><p class="text-muted m-1 my-3">Harga</p></td>
                      <td class="col-10">
                      <h2> Rp<?php
                      $number=$katalog_tumbuhan->harga;
                      echo number_format(floatval($number))?></h2>
                      </td>
                    </tr>

                    <tr class="d-flex">
                      <td class="col-2"><p class="text-muted m-1 my-2">Jumlah</p></td>
                      <td class="col-10">1</td>
                    </tr>

                    <tr class="d-flex">
                      <td class="col-2"><p class="text-muted m-1 my-3">Info Produk</p></td>
                      <td class="col-10"><p class="text-muted m-0">Stok</p><h4>Tersedia</h4></td>
                    </tr>   
                                                                                         
                  </table>
                  <a href="/home"><button type="button" class="btn btn-success mt-4">+ Keranjang</button></a>
                </div>
                @endforeach
        </div>
    </div>
</section>

@endsection
