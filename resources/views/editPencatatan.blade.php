@extends('layout.mainadmin')

@section('title','AdminPage')

@section('container')
    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Edit Pencatatan</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="/admin">Home</a></li>
                        <li>Pencatatan</li>
                        <li>Edit Pencatatan</li>
                    </ol>
                </div>
            </div>
        
            <!-- page start-->
            <div class="row">
                <div class="col-sm-8">
                    <section class="panel">
                    <!-- Form validations -->
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Tambah Pencatatan
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                        @foreach($tanaman as $key =>$data)
                                            <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{route('editTanaman')}}?id={{$data->id}}" enctype="multipart/form-data">
                                            @csrf
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Tanggal Penanaman <span class="required">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control"  name="tanggal_penanaman" minlength="5" type="date" required value="{{$data->tanggal_penanaman}}" />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cemail" class="control-label col-lg-2">Jenis Tanaman <span class="required">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control "  type="text" name="jenis_tanaman" required value="{{$data->jenis_tanaman}}" />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="curl" class="control-label col-lg-2">Suhu Ruangan<span class="required">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control "  type="number" name="suhu_ruangan" value="{{$data->suhu_ruangan}}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="curl" class="control-label col-lg-2">Nutrisi<span class="required">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control "  type="text" name="nutrisi" value="{{$data->nutrisi}}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="curl" class="control-label col-lg-2">Keterangan<span class="required">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control "  type="text" name="keterangan" />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="curl" class="control-label col-lg-2">Gambar<span class="required">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control "  type="file" name="gambar" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary" type="submit">Edit Data</button>
                                                        <button class="btn btn-default" type="reset">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                            @endforeach
                                        </div>

                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection
