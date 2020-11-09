@extends('layout/main')
@section('title','Simponi')
@section('navbar')
    <h1 class="logo mr-auto"><a href="/pembeli" class="text-success">Simponi</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/pembeli">Home</a></li>
          <li><a href="/pembeli#services">Katalog</a></li>
          <li><a href="/pembeli#about">About</a></li>
          <li><a href="/pembeli#contact">Contact</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    <a href="/keluar" class="btn scrollto btn-light">Log Out</a>
@endsection
@section('container')
<section id="services" class="services">
    <div class="container">
        <div class="row">
            @foreach($katalog as $katalog_tumbuhan)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                
                    <div class="icon-box" style="width:100%">
                    <div class="icon"><i class="icofont-heart-beat"></i></div>
                    <h4><a href="/katalog">{{$katalog_tumbuhan->nama_tanaman}}</a></h4>
                    <p>Harga : {{$katalog_tumbuhan->harga}}</p>
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
                    <a href=""><button type="button" class="btn btn-success">Beli Sekarang</button></a>
                </div>
                
                @endforeach
        </div>
    </div>
</section>

@endsection
