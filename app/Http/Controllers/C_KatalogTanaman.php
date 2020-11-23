<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\katalog;

class C_KatalogTanaman extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:penjual');
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
    public function hapusKatalog()
    {
        $katalog_tanaman = DB::table('katalog')->get();
        
        
        
        $id = $_GET['id'];
        katalog::destroy(array($id));
        return redirect('/katalogAdmin');
    }
}
