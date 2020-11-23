@extends('layout/main')
@section('title','Simponi')

@section('container')
<section id="services" class="services">
    <div class="container shadow p-4">
        <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 justify-content-center mb-4">
              <div class="icon-box" id="profil" style="width:100%">
                <div class="image">
                  <img src="assets/img/2864437_86b5f81d-5474-49d4-8241-8954021af099_706_706.png" alt="">
                </div>
                <a href=""><div class="p-2 mx-4 mt-4 d-flex shadow justify-content-center"> Ubah Foto</div></a>
                <div class="px-4 d-flex justify-content-left text-muted"><small> * Ukuran maximal foto adalah 5mb. <br> Extensi file yang diperbolehkan JPG, JPEG, PNG</small></div>
                
              </div>
            </div>
            <div class="description col-lg-6 my-4">
              <h4>Biodata Diri</h4>
              <div class="table-responsive">
              <table class="table table-borderless" id="tabelprofil">
              <tr>
              <td>Nama</td>
              <td>{{ Auth::user()->nama }} <a href="">ubah</a></td>                              
              </tr>
              
              <tr>
              <td>Username</td>
              <td>{{ Auth::user()->username }} <a href="">ubah</a></td>                              
              </tr>

              <tr>
              <td>Email</td>
              <td>{{ Auth::user()->email }} <a href="">ubah</a></td>                              
              </tr>
              
              <tr>
              <td>Jenis Kelamin</td>
              <td>{{ Auth::user()->jenis_kelamin }} <a href="">ubah</a></td>
              </tr>
              
              <tr>
              <td>Password</td>
              <td>********* <a href="">ubah</a></td>
              </tr>
              
              <tr>
              <td>No Hp</td>
              <td>{{ Auth::user()->no_hp }} <a href="">ubah</a></td>
              </tr>
              
              <tr>
              <td>Alamat</td>
              <td>{{ Auth::user()->alamat }} <a href="">ubah</a></td>
              </tr>
              

              </table>
              </div>                
                        
            </div>
        </div>
    </div>
</section>
@endsection
