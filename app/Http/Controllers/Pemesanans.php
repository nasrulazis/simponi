<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\katalog;
use App\pemesanan;
use App\detailpemesanan;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class Pemesanans extends Controller
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
        $tanggal= date('Y-m-d');
        $katalog = katalog::where('id',$id)->first();
        $stok=$katalog->stok;
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric|between:1,'.$stok,
            ]);
            // dd($validator->errors()->all());
            if ($validator->fails()) {
                alert()->error('gagal',$validator->errors()->all());
                return back();
            }
    
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
       
        $pemesanan=pemesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        // $pemesanan->total_harga = $pemesanan->total_harga+$katalog->harga*$request->jumlah; 
        $pemesanan->total_harga = 0; 
        foreach($detailpemesanan as $key=> $data){
            $pemesanan->total_harga +=$data->harga; 
        }       
        $pemesanan->update();
        alert()->success('','Data pesanan produk berhasil ditambahkan');
       return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('checkout_pemesanan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function cekpemesanan(){
        return view('/cekpemesanan');
    }
    
    public function selesaikanpemesanan(){
        $id=$_GET['id'];
        $pemesanan = pemesanan::where('id',$id)->where('status',3)->first();
        if(empty($pemesanan)){
            alert()->error('Gagal','pesanan belum selesai');
        return back();
        }else{

            $pemesanan->status=4;
            $pemesanan->save();
            
            alert()->success('Berhasil','pesanan selesai');
            return back();
        }
    }

    public function pembayaran(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,jpg,png',
            ]);
        if ($validator->fails()) {
            alert()->error('','File harus dalam format JPG,JPEG atau PNG');
            return back();
        }
        $id=$_GET['id'];
        $pemesanan = pemesanan::where('user_id',Auth::user()->id)->where('id',$id)->where('status',1)->first();
        if(!empty($pemesanan)){
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $location=public_path('/images');
            $file->move($location,$filename);
            $pemesanan->gambar=$filename;                       
            $pemesanan->status=2;                       
        }   
        $pemesanan->save();
        alert()->success('Berhasil','menambahkan bukti pembayaran');
        return redirect()->route('cekpemesanan');
    }

    public function edit()
    {
        return view('/pembayaran');
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
        $pemesanan = pemesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
       if(!empty($pemesanan)){
            $pemesanan->status = 1;
            $pemesanan->alamat = $request->kecamatan.' '.$request->alamat;            
            $pemesanan->save();
       }
       alert()->success('Berhasil Checkout','Silahkan melakukan pembayaran!');
       return view('/pembayaran');
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
