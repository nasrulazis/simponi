<?php

namespace App\Http\Controllers;

use App\pembeli;
use Illuminate\Support\Facades\Auth;
use App\penjual;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    function login(Request $kiriman){
        $this->validate($kiriman,[
            'username' => 'required|min:4',
            'password' => 'required|min:6'
        ]);
        $data1= pembeli::where('username', $kiriman->username)->where('password', $kiriman->password)->get();
        $data2= penjual::where('username', $kiriman->username)->where('password', $kiriman->password)->get();
        // dd($data2);
        if (count($data1)>0) {
            # login pembeli
            Auth::guard('pembeli')->LoginUsingId($data1[0]['id']);
            return redirect()->route('pembeli');
        }elseif (count($data2)>0) {
            # login penjual
            Auth::guard('penjual')->LoginUsingId($data2[0]['id']);
            return redirect()->route('admin');
        }else {
            # code...
            return redirect()->back();
        }
    }

    function keluar(){
        if (Auth::guard('pembeli')->check()) {
            # code...
            Auth::guard('pembeli')->logout();
            return redirect()->route('halamanLogin');
        }elseif (Auth::guard('penjual')->check()) {
            # code...
            Auth::guard('penjual')->logout();
            return redirect()->route('halamanLogin');
        } else {
            # code...
            return redirect()->route('halamanLogin');
        }
        
    }
    function Register(){
        return view('register');
    }

    function postRegister(Request $kiriman){
        $this->validate($kiriman,[
            'name' => 'required|min:4',
            'username' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        pembeli::create([
            'nama' => $kiriman->name,
            'username' => $kiriman->username,
            'email' => $kiriman->email,
            'password' => bcrypt($kiriman->password),
            'alamat' => NULL,
            'no_hp' => NULL,
            'jenis_kelamin' => NULL,
            'remember_token' => NULL
        ]);
        return redirect()->back();
    }
}
