<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembeli;
use Illuminate\Support\Facades\Hash;

class Profil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:pembeli');
    }
    public function index()
    {
        return view('profil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $id=$_GET['id'];
        $profil = pembeli::find($id);
        
        if($request->nama!=null&&$request->nama!=$profil->nama){
            $this->validate($request,[
                'nama' => 'required|min:4',                
            ]);
            $profil->nama = $request->nama;
            alert()->success('Sukses','Data berhasil disimpan');
        }else if($request->username!=null&&$request->username!=$profil->username){
            $profil->username = $request->username;
            alert()->success('Sukses','Data berhasil disimpan');
        }else if($request->email!=null&&$request->email!=$profil->email){
            $profil->email = $request->email;
            alert()->success('Sukses','Data berhasil disimpan');
        }else if($request->password!=null){
            $this->validate($request,[                
                'password' => 'required|min:6|confirmed'
            ]);
            $profil->password = Hash::make($request->password);
            alert()->success('Sukses','Data berhasil disimpan');
        }else if($request->alamat!=null&&$request->alamat!=$profil->alamat){
            $profil->alamat = $request->alamat;
            alert()->success('Sukses','Data berhasil disimpan');
        }else if($request->jenis_kelamin!=null&&$request->jenis_kelamin!=$profil->jenis_kelamin){
            $profil->jenis_kelamin = $request->jenis_kelamin;
            alert()->success('Sukses','Data berhasil disimpan');
        }else if($request->no_hp!=null&&$request->no_hp!=$profil->no_hp){
            $profil->no_hp = $request->no_hp;
            alert()->success('Sukses','Data berhasil disimpan');
        }else{
            alert()->warning('Gagal','Tidak ada perubahan');
        }
        $profil->save();
        return back();                   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
