@extends('layout.mainadmin')

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
                <div class="col-sm-8">
                    <section class="panel">
                    <!-- Form validations -->
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Tambah Katalog
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                        <form class="form-validate form-horizontal" id="feedback_form" method="post" action="/tambahKatalog" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Nama Tanaman <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control"  name="namatanaman" minlength="5" type="text" required />
                                            </div>
                                            </div>
                                            <div class="form-group ">
                                            <label for="cemail" class="control-label col-lg-2">Stok <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control "  type="number" name="stok" required />
                                            </div>
                                            </div>
                                            <div class="form-group ">
                                            <label for="curl" class="control-label col-lg-2">Harga<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control "  type="text" name="harga" />
                                            </div>
                                            </div>
                                            <div class="form-group ">
                                            <label for="curl" class="control-label col-lg-2">Gambar<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input class="form-control "  type="file" name="image" />
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit">Tambah Data</button>
                                                <button class="btn btn-default" type="reset">Cancel</button>
                                            </div>
                                            </div>
                                        </form>
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
