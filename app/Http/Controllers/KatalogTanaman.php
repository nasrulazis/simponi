<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\katalog;

class KatalogTanaman extends Controller
{
    public function katalog()
    {
        $katalog= katalog::where('id', $_GET['id'])->get();
        return view('katalog', ['katalog' => $katalog]);
    }

    public function katalogAdmin()
    {
        $katalog_tanaman = katalog::paginate(20);        
        return view('katalogAdmin', compact('katalog_tanaman'));
    }
    
    public function tambahkatalogAdmin()
    {
        // dump(Auth::guest());
        $katalog_tanaman = DB::table('katalog')->get();
        return view('tambahkatalogAdmin', ['katalog_tanaman' => $katalog_tanaman]);
    }
    public function tambahKatalog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namatanaman' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png'
            ]);
        if ($validator->fails()) {
            alert()->error('','Form data katalog tidak boleh kosong');
            return back();
        }
        $katalog=New katalog;
        $katalog->nama_tanaman=$request->namatanaman;
        $katalog->stok=$request->stok;
        $katalog->harga=$request->harga;
        $katalog->id_penjual=1;
        $file=$request->file('image');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $location=public_path('/images');
        $file->move($location,$filename);
        $katalog->gambar=$filename;
        $katalog->save();

        alert()->success('','Data Katalog Tanaman berhasil ditambahkan');
        return redirect('/katalogAdmin');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $katalog_tanaman=katalog::where('id',$id)->get();
        return view('editkatalogAdmin', ['katalog_tanaman' => $katalog_tanaman]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namatanaman' => 'required|min:4',
            'stok' => 'required',
            'harga' => 'required|min:3',
            'gambar' => 'image|mimes:jpeg,jpg,png'
            ]);
        if ($validator->fails()) {
            alert()->error('','Form data katalog tidak boleh kosong');
            return back();
        }
        $id = $_GET['id'];
        $katalog=katalog::find($id);
        $katalog->nama_tanaman = $request->namatanaman;
        $katalog->stok = $request->stok;
        $katalog->harga = $request->harga;
        $file=$request->file('image');
        if(!empty($request->file('image'))){
            $filename=time().'.'.$file->getClientOriginalExtension();
            $location=public_path('/images');
            $file->move($location,$filename);
            $katalog->gambar=$filename;
        }
        $katalog->save();

        alert()->success('','Data katalog tanaman berhasil disimpan');
        return redirect('/katalogAdmin');
    }

    public function hapusKatalog()
    {
        $katalog_tanaman = DB::table('katalog')->get();
        
        
        
        $id = $_GET['id'];
        katalog::destroy(array($id));
        alert()->success('','Data Katalog Tanaman berhasil dihapus');
        return redirect('/katalogAdmin');
    }
}
