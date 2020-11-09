<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\katalog;
use App\pertumbuhan_tanaman;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    //guest
    public function index()
    {
        // dump(Auth::guest());
        // dump(Auth::guard('penjual'));
        $katalog = DB::table('katalog')->get();
        return view('index', ['katalog' => $katalog]);
    }
    public function login()
    {
        // dump(Auth::guest());
        // dump(Auth::guard('penjual'));
        return view('login');
    }
    public function katalog()
    {
        $katalog= katalog::where('id', $_GET['id'])->get();
        return view('katalog', ['katalog' => $katalog]);
    }
    public function daftar()
    {
        // dump(Auth::guest());
        return view('register');
    }

    //pembeli
    public function pembeli()
    {
        // dump(Auth::guest());
        // dump(Auth::guard('penjual'));
        // dump(Auth::guard('pembeli'));
        $katalog = DB::table('katalog')->get();
        return view('pembeli', ['katalog' => $katalog]);
    }
    public function katalogPembeli()
    {
        $katalog= katalog::where('id', $_GET['id'])->get();
        return view('katalogPembeli', ['katalog' => $katalog]);
    }
    

    //penjual
    public function admin()
    {
        // dump(Auth::guest());
        // dump(Auth::guard('penjual'));
        $pertumbuhan_tanaman = DB::table('pertumbuhan_tanaman')->get();
        $katalog_tanaman = DB::table('katalog')->get();
        return view('admin', ['pertumbuhan_tanaman' => $pertumbuhan_tanaman],['katalog_tanaman' => $katalog_tanaman]);
    }
    public function pencatatan()
    {
        // dump(Auth::guest());
        // dump(Auth::guard('penjual'));
        $pertumbuhan_tanaman = DB::table('pertumbuhan_tanaman')->get();
        return view('pencatatan', ['pertumbuhan_tanaman' => $pertumbuhan_tanaman]);
    }
    public function katalogAdmin()
    {
        // dump(Auth::guest());
        $katalog_tanaman = DB::table('katalog')->get();
        return view('katalogAdmin', ['katalog_tanaman' => $katalog_tanaman]);
    }
    public function tambahkatalogAdmin()
    {
        // dump(Auth::guest());
        $katalog_tanaman = DB::table('katalog')->get();
        return view('tambahkatalogAdmin', ['katalog_tanaman' => $katalog_tanaman]);
    }
    public function tambahKatalog(Request $kiriman)
    {
        $this->validate($kiriman,[
            'namatanaman' => 'required|min:4',
            'stok' => 'required',
            'harga' => 'required|min:3'
        ]);
        katalog::create([
            'nama_tanaman' => $kiriman->namatanaman,
            'stok' => $kiriman->stok,
            'harga' => $kiriman->harga,
            'gambar' => NULL,
            'id_penjual' => 1
        ]);
        return redirect('/katalogAdmin');
    }
    public function tambahPencatatan()
    {
        // dump(Auth::guest());
        // dump(Auth::guard('penjual'));
        $pertumbuhan_tanaman = DB::table('pertumbuhan_tanaman')->get();
        return view('tambahPencatatan', ['pertumbuhan_tanaman' => $pertumbuhan_tanaman]);
    }
    public function tambahTanaman(Request $kiriman)
    {
        $this->validate($kiriman,[
            'tanggal_penanaman' => 'required',
            'suhu_ruangan' => 'required',
            'nutrisi' => 'required',
            'jenis_tanaman' => 'required'
        ]);
        katalog::create([
            'tanggal_penanaman' => $kiriman->tanggal_penanaman,
            'suhu_ruangan' => $kiriman->suhu_ruangan,
            'nutrisi' => $kiriman->nutrisi,
            'jenis_tanaman' => $kiriman->jenis_tanaman,
            'id_penjual' => 1
        ]);
        return redirect('/pencatatan');
    }
}