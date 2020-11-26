<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\katalog;
use App\pemesanan;
use App\detailpemesanan;
use Auth;
use Carbon\Carbon;

class C_Pemesanan extends Controller
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
        $katalog= katalog::where('id', $_GET['id'])->get();
        return view('pemesanan', ['katalog' => $katalog]);
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
       $id=$_GET['id'];
       $tanggal= Carbon::now();
    
       $katalog = katalog::where('id',$id)->first();
    
    // simpan ke pemesanan
       $cek_pemesanan = pemesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
       if(empty($cek_pemesanan)){
            $pemesanan = new pemesanan;
            $pemesanan->user_id = Auth::user()->id;
            $pemesanan->tanggal = $tanggal;
            $pemesanan->status = 0;
            $pemesanan->total_harga = 0;
            $pemesanan->save();
       }   

       

       $pesanan_id=pemesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
       $cek_detailpemesanan=detailpemesanan::where('katalog_id',$katalog->id)->where('pesanan_id',$pesanan_id->id)->first();
    // simpan ke detail pemesanan
       if(empty($cek_detailpemesanan)){
            $detailpemesanan = new detailpemesanan;
            $detailpemesanan->katalog_id=$katalog->id;
            
            $detailpemesanan->pesanan_id=$pesanan_id->id;
            $detailpemesanan->jumlah=$request->jumlah;
            $detailpemesanan->harga=$katalog->harga*$request->jumlah;
            $detailpemesanan->save();
       }else{
            $detailpemesanan=detailpemesanan::where('katalog_id',$katalog->id)->where('pesanan_id',$pesanan_id->id)->first();
            $detailpemesanan->jumlah+=$request->jumlah;
            $detailpemesanan->harga+=$katalog->harga*$request->jumlah;
            $detailpemesanan->update();
       }
       
       $detailpemesanan=detailpemesanan::where('pesanan_id',$pesanan_id->id)->get();
    //    dd($detailpemesanan);
       foreach($detailpemesanan as $key => $data){
        $pemesanan=pemesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pemesanan->total_harga += $data->harga;
        }
        $pemesanan->update();
       return back();


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
    public function update(Request $request, $id)
    {
        //
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
