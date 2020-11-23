@extends('layout/main')
@section('title','Simponi')
@section('container')
<section id="services" class="services">
    <div class="container">
        <div class="row">
            @foreach($katalog as $katalog_tumbuhan)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 justify-content-center mb-4">
              <div class="icon-box" style="width:100%">
                <div class="image">
                  <img src="assets/img/2864437_86b5f81d-5474-49d4-8241-8954021af099_706_706.png" alt="">
                </div>
              </div>
            </div>
                <div class="description col-lg-6">
                        <h1 class="font-weight-bold">{{$katalog_tumbuhan->nama_tanaman}}</h1><br>
                        <hr>
                    <div class="harga">
                        <p>Harga : </p><h2>Rp. {{$katalog_tumbuhan->harga}}</h2>
                    </div>
                    <div class="stock">
                        <p>Sisa Stock : </p> <p class="h5">Stock Terbatas<{{$katalog_tumbuhan->stok}}</p>
                    </div>
                    <br><br>
                    <a href="#"><button type="button" class="btn btn-success">Beli Sekarang</button></a>
                </div>
                
                @endforeach
        </div>
    </div>
</section>

@endsection
