@extends('layout/mainadmin')
@section('title','AdminPage')
@section('container')
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"></i> Pemesanan</h3>
                    <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="/admin">Home</a></li>
                    <li></i>Pemesanan</li>
                    </ol>
                </div>
            </div>
        
            <!-- page start-->
            <div class="row">
                <div class="col-lg-10">
                    <section class="panel">
                        <header class="panel-heading">
                        Pemesanan                    
                        </header>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>user</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach($pemesanan as $key=>$data)
                            <?php
                            $usernama = \App\pembeli::where('id', $data->user_id)->first();                                                      
                            ?>
                            @if($data->status>0)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$usernama->nama}}</td>
                            <td>{{$data->tanggal}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->status}}</td>
                            <td><a href="" data-toggle="modal" data-target="#modalfoto{{$loop->iteration}}"><div class="col-md-4"><img src="images/{{$data->gambar}}" style="width:100%" alt=""></div></a></td>
                            <td class="col-md-3">
                            @if($data->status==2)
                                <a href="" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModalCenter{{$data->id}}">Verifikasi</a>
                                <button class="btn btn-danger">Delete</button>
                                
                                <div class="modal fade" id="exampleModalCenter{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle{{$data->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close my-0 py-0" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Verifikasi Pembayaran?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{route('verifikasi')}}?id={{$data->id}}" class="btn btn-primary">Verifikasi</a>       
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($data->status==1)
                                <p>Menunggu Pembayaran</p>
                            @elseif($data->status==4)
                                <p>Selesai</p>
                            @else
                                <p>Dibayar</p>
                            @endif
                            </td>

                            </tr>
                            @endif
                            
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    </section>
                </div>
            </div>
        </section>
    </section>
    @foreach($pemesanan as $key=>$data)
    <div class="modal fade bd-example-modal-sm mt-4" tabindex="-1" role="dialog" aria-labelledby="modalfoto{{$loop->iteration}}" id="modalfoto{{$loop->iteration}}" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <img src="images/{{$data->gambar}}" class="mt-4" style="width:100%;" alt="">
            </div>
        </div>
    </div>
    @endforeach
    
@endsection
