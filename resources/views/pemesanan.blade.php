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
                @if(!empty($katalog_tumbuhan->gambar))

                <img src="images/{{$katalog_tumbuhan->gambar}}" alt="">
                @else
                <img src="assets/img/2864437_86b5f81d-5474-49d4-8241-8954021af099_706_706.png" alt="">
                @endif
                </div>
              </div>
            </div>
                <div class="description col-lg-6">
                <h1 class="font-weight-bold mb-3">{{$katalog_tumbuhan->nama_tanaman}}</h1>
                  <table id="tabelkatalog" class="table">
                    
                    <tbody>
                    <tr class="d-flex">
                      <td class="col-2 d-flex align-items-center"><p class="text-muted mb-0">Harga</p></td>
                      <td class="col-10">
                      <h2> Rp<?php
                      $number=$katalog_tumbuhan->harga;
                      echo number_format(floatval($number))?></h2>
                      </td>
                    </tr>

                    

                    <tr class="d-flex">
                      <td class="col-2 d-flex align-items-center"><p class="text-muted">Info Produk</p></td>
                      <td class="col-10 d-flex align-items-center">
                      <div class="">
                      <p class="text-muted m-0">Stok</p>
                      <h4>{{$katalog_tumbuhan->stok}} KG</h4>
                      </div>
                      </td>
                    </tr>
                    <form action="{{route('pemesanan')}}?id={{$katalog_tumbuhan->id}}" method="post">
                    @csrf
                    <tr class="d-flex">
                      <td class="col-2 d-flex align-items-center"><p class="text-muted mb-0">Jumlah Pesanan</p></td>
                      <td class="col-10"><input type="number" name="jumlah" placeholder="Jumlah Pesanan" class="form-control"></td>
                    </tr>   
                    </tbody>                                                             
                  </table>
                  <input type="submit" class="btn btn-success" value="+ Keranjang">
                  </form>
                </div>
                @endforeach
        </div>
    </div>
</section>

@endsection
