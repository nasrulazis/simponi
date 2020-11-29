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
            <div class="shadow p-4 mb-3">Cek Pemesanan</div>
            <div class="shadow p-4">
            
              <?php                       
            $semuapemesanan = \App\pemesanan::where('user_id', Auth::user()->id)->get();                                            
            $katalog=\App\katalog::All();
            ?>
            @if(!empty($semuapemesanan))
              
              @foreach($semuapemesanan as $key => $data)
              <?php                              
              $total_pemesanan=$data->total_harga;    
              $detail=\App\detailpemesanan::where('pesanan_id',$data->id)->get();                            
              $jumlahpemesanan=count($detail);
              $angka_status=$data->status;
              if($angka_status==1){
                $text_status="Menunggu Pembayaran";
              }else if($angka_status==2){
                $text_status="Menunggu Konfirmasi Pembayaran";                
              }else{
                $text_status="Pembayaran Telah Dikonfirmasi Barang sedang dikirim";                
              }
              ?>
              <div class="d-flex w-100 align-items-center">
                <div>
                  <div class="h4 font-weight-bold ">Pemesanan {{$data->id}} {{$data->tanggal}}</div>                  
                </div>

                <div class="text-center d-flex align-items-center justifiy-content-between w-100">
                <div class="h5 font-weight-bold ">Status</div>
                <hr>
                <form action="">
                  <label for="upload-photo" class="btn btn-outline-success disabled">{{$text_status}}</label>                  
                </form>
                </div>
              </div>
              <hr>
              @endforeach              
            @else
            <div class="d-flex w-100 align-items-center">
            <p>Belum ada data</p>
            </div>
            
            @endif
            </div>
            </div>
            <div class="col-4 shadow h-100 p-4">
              <p class="m-2">Jam operasional Simponi adalah <b> Senin-Jumat Pukul 09.00-20.00 WIB dan Sabtu Pukul 09.00-14.00 WIB.</b></p>
              <h4 class="d-flex justify-content-center">Transfer Ke</h4>
              <div class="row m-2">
                <div class="col-12">
                  <div class="list-group d-flex flex-row" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">BNI</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">BRI</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">MANDIRI</a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">BCA</a>
                  </div>
                </div>                
              </div>
              <div class="col-12 d-flex justify-content-center">
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active text-center" id="list-home" role="tabpanel" aria-labelledby="list-home-list">a/n SIMPONI<h3>5046772</h3></div>
                  <div class="tab-pane fade text-center" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">a/n SIMPONI<h3>563101017240538</h3></div>
                  <div class="tab-pane fade text-center" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">a/n SIMPONI<h3>1392307588</h3></div>                  <div class="tab-pane fade text-center" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">a/n SIMPONI<h3>1300010553256</h3></div>
                </div>
              </div>
              <p class="text-center">Pastikan pembayaran tertuju kepada no rekening atas nama <b>SIMPONI</b></p>    
            </div>
        </div>
    </div>
</section>
@endsection
