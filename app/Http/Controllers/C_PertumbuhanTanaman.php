<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pertumbuhan_tanaman;
class C_PertumbuhanTanaman extends Controller
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
        $pertumbuhan_tanaman = pertumbuhan_tanaman::All();
        return view('pencatatan', ['pertumbuhan_tanaman' => $pertumbuhan_tanaman]);
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
        $this->validate($request,[
            'tanggal_penanaman' => 'required',
            'suhu_ruangan' => 'required',
            'nutrisi' => 'required',
            'jenis_tanaman' => 'required'
        ]);
        pertumbuhan_tanaman::create([
            'tanggal_penanaman' => $request->tanggal_penanaman,
            'suhu_ruangan' => $request->suhu_ruangan,
            'nutrisi' => $request->nutrisi,
            'jenis_tanaman' => $request->jenis_tanaman,
            'id_penjual' => 1
        ]);
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
        $this->validate($request,[
            'tanggal_penanaman' => 'required',
            'suhu_ruangan' => 'required',
            'nutrisi' => 'required',
            'jenis_tanaman' => 'required'
        ]);
        $id = $_GET['id'];
        $tanaman=pertumbuhan_tanaman::find($id);
        $tanaman->tanggal_penanaman = $request->tanggal_penanaman;
        $tanaman->suhu_ruangan = $request->suhu_ruangan;
        $tanaman->nutrisi = $request->nutrisi;
        $tanaman->jenis_tanaman = $request->jenis_tanaman;
        $tanaman->id_penjual = 1;
        $tanaman->save();

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
        return back();
    }
}
