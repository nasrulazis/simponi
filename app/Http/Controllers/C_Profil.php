<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembeli;
use Illuminate\Support\Facades\Hash;

class C_Profil extends Controller
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
        
        if($request->nama!=null){
            $this->validate($request,[
                'nama' => 'required|min:4',                
            ]);
            $profil->nama = $request->nama;
        }else if($request->username!=null){
            $profil->username = $request->username;
        }else if($request->email!=null){
            $profil->email = $request->email;
        }else if($request->password!=null){
            $this->validate($request,[                
                'password' => 'required|min:6|confirmed'
            ]);
            $profil->password = Hash::make($request->password);
        }else if($request->alamat!=null){
            $profil->alamat = $request->alamat;
        }else if($request->jenis_kelamin!=null){
            $profil->jenis_kelamin = $request->jenis_kelamin;
        }else if($request->no_hp!=null){
            $profil->no_hp = $request->no_hp;
        }else{
            
        }
        $profil->save();

        return back()->withMessage("Data berhasil disimpan");                          
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
