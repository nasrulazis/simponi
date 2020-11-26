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
    <div class="container shadow p-4">    
        <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 justify-content-center mb-4">
        
              <div class="icon-box" id="profil" style="width:100%">
                <div class="image">
                  <img src="assets/img/2864437_86b5f81d-5474-49d4-8241-8954021af099_706_706.png" alt="">
                </div>
                <a href=""><div class="btn btn-outline-success p-2 mx-4 mt-4 d-flex justify-content-center"> Ubah Foto</div></a>
                <div class="px-4 d-flex justify-content-left text-muted"><small> * Ukuran maximal foto adalah 5mb. <br> Extensi file yang diperbolehkan JPG, JPEG, PNG</small></div>
                
              </div>
            </div>
            <div class="description col-lg-6 my-4">
              <h4>Biodata Diri</h4>
              <div class="table-responsive">
              <table class="table table-borderless" id="tabelprofil">
              <tr>
              <td>Nama</td>
              <td>{{ Auth::user()->nama }} <a href="" data-toggle="modal" data-target="#modalNama">ubah</a></td>                              
              </tr>
              
              <tr>
              <td>Username</td>
              <td>{{ Auth::user()->username }} <a href="" data-toggle="modal" data-target="#modalUsername">ubah</a></td>                              
              </tr>

              <tr>
              <td>Email</td>
              <td>{{ Auth::user()->email }} <a href="" data-toggle="modal" data-target="#modalEmail">ubah</a></td>                              
              </tr>
              
              <tr>
              <td>Jenis Kelamin</td>
              <td>{{ Auth::user()->jenis_kelamin }} <a href="" data-toggle="modal" data-target="#modalJenisKelamin">ubah</a></td>
              </tr>
              
              <tr>
              <td>Password</td>
              <td>********* <a href="" data-toggle="modal" data-target="#modalPassword">ubah</a></td>
              </tr>
              
              <tr>
              <td>No Hp</td>
              <td>{{ Auth::user()->no_hp }} <a href=""  data-toggle="modal" data-target="#modalNoHp">ubah</a></td>
              </tr>
              
              <tr>
              <td>Alamat</td>
              <td>{{ Auth::user()->alamat }} <a href=""  data-toggle="modal" data-target="#modalAlamat">ubah</a></td>
              </tr>
              

              </table>
              </div>                
                        
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalNama" tabindex="-1" role="dialog" aria-labelledby="modalNama" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Nama</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('updateprofil')}}?id={{ Auth::user()->id }}" method="post">
          @csrf
            <div class="modal-body">
              <input type="text" name="nama" value="{{ Auth::user()->nama }}" class="form-control">
              <small class="text-muted">* Ubah nama anda sesuai dengan identitas anda</small>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <input type="submit" class="btn btn-success" value="Simpan">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalUsername" tabindex="-1" role="dialog" aria-labelledby="modalUsername" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Username</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('updateprofil')}}?id={{ Auth::user()->id }}" method="post">
          @csrf
          <div class="modal-body">
            <input type="text" name="username" value="{{ Auth::user()->username }}" class="form-control">
            <small class="text-muted">* Ubah username anda menggunakan minimal 8 karakter yang terdiri dari minimal 1 angka</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" class="btn btn-success" value="Simpan">
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="modalEmail" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Email</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('updateprofil')}}?id={{ Auth::user()->id }}" method="post">
          @csrf
          <div class="modal-body">
            <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control">
            <small class="text-muted">* Ubah Email anda sesuai dengan identitas asli anda</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" class="btn btn-success" value="Simpan">
          </div>
          </form>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="modalJenisKelamin" tabindex="-1" role="dialog" aria-labelledby="modalJenisKelamin" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit JenisKelamin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('updateprofil')}}?id={{ Auth::user()->id }}" method="post">
          @csrf
            <div class="modal-body">
              <input type="radio" id="LakiLaki" name="jenis_kelamin" value="Laki-Laki" >
              <label for="LakiLaki">Laki-Laki</label><br>
              <input type="radio" id="Perempuan" name="jenis_kelamin" value="Perempuan" >
              <label for="LakiLaki">Perempuan</label><br>            
              <small class="text-muted">* Ubah Jenis Kelamin anda sesuai dengan identitas asli anda</small>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <input type="submit" class="btn btn-success" value="Simpan">
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="modalPassword" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('updateprofil')}}?id={{ Auth::user()->id }}" method="post">
          @csrf
          <div class="modal-body">
            <label for="passwordLama">Password Lama</label>
            <input type="password" name="passwordLama" class="form-control">
            <label for="password">Password Baru</label>
            <input type="password" name="password" class="form-control" id="password">
            <label for="password-confirm">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password-confirm"  class="form-control">
            <small class="text-muted">* Ubah Password anda minimal 8 karakter</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" class="btn btn-success" value="Simpan">
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalNoHp" tabindex="-1" role="dialog" aria-labelledby="modalNoHp" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit No Hp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('updateprofil')}}?id={{ Auth::user()->id }}" method="post">
          @csrf
          <div class="modal-body">
            <input type="text" name="no_hp" value="{{ Auth::user()->no_hp }}" class="form-control">
            <small class="text-muted">* Ubah No Hp anda sesuai dengan identitas asli anda</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" class="btn btn-success" value="Simpan">
          </div>
          </form>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="modalAlamat" tabindex="-1" role="dialog" aria-labelledby="modalAlamat" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Alamat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('updateprofil')}}?id={{ Auth::user()->id }}" method="post">
          @csrf
          <div class="modal-body">
            <input type="text" name="alamat" value="{{ Auth::user()->alamat }}" class="form-control">
            <small class="text-muted">* Ubah Alamat anda sesuai dengan identitas asli anda</small>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" class="btn btn-success" value="Simpan">
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal -->
</section>
@endsection
