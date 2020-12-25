<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pertumbuhan_tanaman;
use Illuminate\Support\Facades\Validator;

class PertumbuhanTanaman extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:penjual');
    }
    public function index()
    {
        $pertumbuhan_tanaman = pertumbuhan_tanaman::orderBy('tanggal_penanaman', 'asc')->get();
        return view('pencatatan', compact('pertumbuhan_tanaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahPencatatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_penanaman' => 'required',
            'suhu_ruangan' => 'required',
            'nutrisi' => 'required',
            'jenis_tanaman' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png'
            ]);
        if ($validator->fails()) {
            alert()->error('','Form data pertumbuhan tanaman tidak boleh kosong');
            return back();
        }
        $tanaman = New pertumbuhan_tanaman;
        $tanaman->tanggal_penanaman = $request->tanggal_penanaman;
        $tanaman->suhu_ruangan = $request->suhu_ruangan;
        $tanaman->nutrisi = $request->nutrisi;
        $tanaman->jenis_tanaman = $request->jenis_tanaman;
        $tanaman->id_penjual = 1;
        $tanaman->keterangan = $request->keterangan;
        $file=$request->file('gambar');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $location=public_path('/images');
        $file->move($location,$filename);
        $tanaman->gambar=$filename;
        $tanaman->save();
        alert()->success('','Data Pertumbuhan Tanaman berhasil ditambahkan');
        return redirect('/pencatatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = $_GET['id'];
        $tanaman=pertumbuhan_tanaman::where('id',$id)->get();
        // dd($tanaman);
        return view('editPencatatan',['tanaman' => $tanaman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_penanaman' => 'required',
            'suhu_ruangan' => 'required',
            'nutrisi' => 'required',
            'jenis_tanaman' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png'
            ]);
        if ($validator->fails()) {
            alert()->error('','Form data pertumbuhan tanaman tidak boleh kosong');
            return back();
        }
        $id = $_GET['id'];
        $tanaman=pertumbuhan_tanaman::find($id);
        $tanaman->tanggal_penanaman = $request->tanggal_penanaman;
        $tanaman->suhu_ruangan = $request->suhu_ruangan;
        $tanaman->nutrisi = $request->nutrisi;
        $tanaman->jenis_tanaman = $request->jenis_tanaman;
        $tanaman->keterangan = $request->keterangan;
        $file=$request->file('gambar');
        if(!empty($request->file('gambar'))){
            $filename=time().'.'.$file->getClientOriginalExtension();
            $location=public_path('/images');
            $file->move($location,$filename);
            $tanaman->gambar=$filename;
        }
        $tanaman->id_penjual = 1;
        $tanaman->save();
        alert()->success('','Data pertumbuhan tanaman berhasil disimpan');
        return redirect('/pencatatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id = $_GET['id'];
        $tanaman=pertumbuhan_tanaman::find($id);
        $tanaman->delete();
        alert()->success('','Data Pertumbuhan Tanaman berhasil dihapus');
        return back();
    }
}
