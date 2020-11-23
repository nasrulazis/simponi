@extends('layout/mainadmin')
@section('title','AdminPage')
@section('container')
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"></i> Katalog</h3>
                <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/admin">Home</a></li>
                <li></i>Katalog</li>
                </ol>
            </div>
            </div>
        
            <!-- page start-->
            <div class="row">
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
                        <th></th>
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
                        <td class="text-right"><button class="btn btn-warning">Ubah</button> <a href="hapusKatalog?id={{$katalog->id}}"><button class="btn btn-danger">Hapus</button></td></a>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </section>
                <a href="{{route('tambahKatalog')}}"><button class="btn btn-success">Tambah Data</button></a>
            </div>
        </section>
    </section>
@endsection
