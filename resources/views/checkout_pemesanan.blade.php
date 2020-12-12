@extends('layout/main')
@section('title','Simponi')

@section('container')
<section id="services" class="services">

        @if(Session::has('message'))
        <div class="container">
        
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ Session::get('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        </div>
        @endif
    <div class="container p-4">    
        <div class="row">
            <div class="col-8">
            <div class="shadow p-4 mb-3">Pilih Barang</div>
            <div class="shadow p-4">

              <?php
            $pemesanan = \App\pemesanan::where('user_id', Auth::user()->id)->where('status',0)->first();            
            $total_pemesanan=$pemesanan->total_harga;
            $detail=\App\detailpemesanan::where('pesanan_id',$pemesanan->id)->get();
            $jumlahpemesanan=count($detail);
            $katalog=\App\katalog::All();
            ?>

              @foreach($detail as $key => $data)
              <?php
              $katalog=\App\katalog::where('id',$data->katalog_id)->first();
              $katalognama=$katalog->nama_tanaman;              
              ?>
              <div class="d-flex justify-content-between w-100"><div><div class="font-weight-bold">{{$katalognama}}</div>{{number_format(floatval($data->harga))}}</div> <div class="d-flex justify-content-center align-items-center"><button class="btn">-</button><input type="text" value="{{$data->jumlah}}" class="form-control col-3">  <button class="btn">+</button></div> </div>
              <hr>
              @endforeach              
              
            </div>
            </div>
            <div class="col-4 shadow">
              <form action="{{route('pembayaran')}}" method="post" class="p-4">
              @csrf
                <h2 for="">Alamat Pengiriman</h2>
                <label for="" class="pt-2">Nama</label>
                <input type="text" value="{{Auth::user()->nama}}" name="nama" class="form-control" placeholder="Nama" >
                <label for="" class="pt-2">Alamat</label>
                <textarea name="alamat" id="" rows="3" class="form-control" name="alamat" placeholder="Alamat" style=" resize: none;"></textarea>                                
                <label for="" class="pt-2">Kecamatan</label>
                <div class="input-group mb-3">
                  <!-- <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                  </div> -->
                  <select class="custom-select" name="kecamatan" id="inputGroupSelect01">
                    <option selected disabled>Pilih Kecamatan</option>
                    <option value="Panji">Panji</option>
                    <option value="Situbondo">Situbondo</option>
                    <option value="Mangaran">Mangaran</option>
                    <option value="Kapongan">Kapongan</option>
                    <option value="Panarukan">Panarukan</option>
                  </select>
                </div>
                <div class="d-flex justify-content-center">
                  <small class="text-center">Kecamatan anda tidak ditemukan?  Mohon maaf jika kecamatan anda belum tercakup</small>
                </div>
                <hr>
                <div class="d-flex justify-content-between w-100 mb-4"><div>Total Harga</div> Rp{{number_format(floatval($total_pemesanan))}}</div>
                <input type="submit" value="Beli({{$jumlahpemesanan}})" class="btn btn-success w-100">
              </form>            
            </div>
        </div>
    </div>
</section>
@endsection
