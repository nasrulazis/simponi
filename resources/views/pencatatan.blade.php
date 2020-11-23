@extends('layout/mainadmin')
@section('title','AdminPage')
@section('container')
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"></i> Pencatatan</h3>
                <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="/admin">Home</a></li>
                <li></i>Pencatatan</li>
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
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Penanaman</th>
                        <th>Jenis Tumbuhan yang ditanam</th>
                        <th>Suhu Ruangan</th>
                        <th>Pupuk</th>
                        <th></th>
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
                        <td class="text-right"><button class="btn btn-warning">Ubah</button> <a href="hapusTanaman?id={{$pertumbuhan->id}}"><button class="btn btn-danger">Hapus</button></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </section>
                <a href="{{route('tambahPencatatan')}}"><button class="btn btn-success">Tambah Data</button></a>
            </div>
        </section>
    </section>
@endsection
