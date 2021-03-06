@extends('layout/mainadmin')
@section('title','AdminPage')
@section('container')
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"></i> Dashboard</h3>
                <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/admin">Home</a></li>
                <li></i>Dashboard</li>
                </ol>
            </div>
            </div>
        
            <!-- page start-->
            <div class="row">
            <div class="col-sm-6">
                <section class="panel">
                <header class="panel-heading">
                    Pencatatan Hidroponik
                </header>
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Penanaman</th>
                        <th>Jenis Tumbuhan yang ditanam</th>
                        <th>Suhu Ruangan</th>
                        <th>Pupuk</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pertumbuhan_tanaman as $pertumbuhan)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pertumbuhan->tanggal_penanaman}}</td>
                        <td>{{$pertumbuhan->jenis_tanaman}}</td>
                        <td>{{$pertumbuhan->suhu_ruangan}}</td>
                        <td>{{$pertumbuhan->nutrisi}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </section>
                <a href="/pencatatan"><button class="btn btn-info">  Lihat Selengkapnya</button></a>
            </div>
            <div class="col-sm-6">
                <section class="panel">
                <header class="panel-heading">
                    Katalog
                </header>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tanaman</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($katalog_tanaman as $katalog)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$katalog->nama_tanaman}}</td>
                        <td>{{$katalog->stok}}</td>
                        <td>{{$katalog->harga}}</td>
                        <td>{{$katalog->gambar}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </section>
                <a href="/katalogAdmin"><button class="btn btn-info">Lihat Selengkapnya</button></a>
            </div>
        </section>
    </section>
@endsection
