<?php

namespace App\Http\Controllers;

use App\pembeli;
use Illuminate\Support\Facades\Auth;
use App\penjual;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(Request $kiriman){
        $data1= pembeli::where('username', $kiriman->username)->where('password', $kiriman->password)->get();
        $data11 = DB::table('pembeli')->get();
        $data2= penjual::where('username', $kiriman->username)->where('password', $kiriman->password)->get();
        // dd($data2);
        if (count($data1)>0) {
            # login pembeli
            Auth::guard('pembeli')->LoginUsingId($data1[0]['id']);
            return redirect('/');
        }elseif (count($data2)>0) {
            # login penjual
            Auth::guard('penjual')->LoginUsingId($data2[0]['id']);
            return redirect('/admin');
        }else {
            # code...
            return "gagal login";
        }
    }

    function logout(){
        if (Auth::guard('pembeli')->check()) {
            # code...
            Auth::guard('pembeli')->logout();
            return redirect('/home');
        }elseif (Auth::guard('penjual')->check()) {
            # code...
            Auth::guard('penjual')->logout();
            return redirect('/home');
        } else {
            # code...
            return redirect('/');
        }
        
    }
}
