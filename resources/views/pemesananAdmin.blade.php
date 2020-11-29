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
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$usernama->nama}}</td>
                    <td>{{$data->tanggal}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->status}}</td>
                    <td><div class="col-md-4"><img src="images/{{$data->gambar}}" style="width:100%" alt=""></div></td>
                    <td class="col-md-3">
                        <a href="{{route('verifikasi')}}?id={{$data->user_id}}" class="btn btn-primary mb-4">Verifikasi</a>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </section>
                </div>
            </div>
        </section>
    </section>
@endsection
