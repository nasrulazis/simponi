<?php

namespace App\Http\Controllers;

use App\pembeli;
use Illuminate\Support\Facades\Auth;
use App\penjual;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    


    function login(Request $kiriman){
        $validator = Validator::make($kiriman->all(), [
            'username' => 'required',
            'password' => 'required'
            ]);
        // $this->validate($kiriman,[
        //     'username' => 'required|min:4',
        //     'password' => 'required|min:6'
        // ]);
        // $validator->errors()->add('username', 'Username/Password Salah');
        // dd($validator->errors()->get('username'));
        if ($validator->fails()) {
            alert()->error('','Username dan password harap diisi');
            return back();
        }
        $data1= pembeli::where('username', $kiriman->username)->get();
        $data2= penjual::where('username', $kiriman->username)->get();
        $password1=$data1->makeVisible('password')->toArray();
        $password2=$data2->makeVisible('password')->toArray();
        // var_dump($password1[0]['password']);
        // dd(Hash::check($kiriman->password, $password1[0]['password']));
        if (count($data1)>0) {
            # login pembeli
            if (Hash::check($kiriman->password, $password1[0]['password'])) {
                Auth::guard('pembeli')->LoginUsingId($data1[0]['id']);
                return redirect()->route('pembeli');
            } else {
                alert()->error('','Maaf,
            username dan password anda tidak
            sesuai. Harap periksa kembali');
                return redirect()->route('login');
                
            }
            
            
        }elseif (count($data2)>0) {
            # login penjual
            if (Hash::check($kiriman->password, $password2[0]['password'])) {
                Auth::guard('penjual')->LoginUsingId($data2[0]['id']);
            return redirect()->route('admin');
            } else {
                alert()->error('','Maaf,
            username dan password anda tidak
            sesuai. Harap periksa kembali');
            return redirect()->route('login');  
            }
            
        }else {
            alert()->error('','Maaf,
            username dan password anda tidak
            sesuai. Harap periksa kembali');
            return redirect()->route('login');
        }
    }

    function keluar(){
        if (Auth::guard('pembeli')->check()) {
            # code...
            Auth::guard('pembeli')->logout();
            return redirect()->route('login');
        }elseif (Auth::guard('penjual')->check()) {
            # code...
            Auth::guard('penjual')->logout();
            return redirect()->route('login');
        } else {
            # code...
            return redirect()->route('login');
        }
        
    }
    function Register(){
        return view('register');
    }

    function index(){
        return view('login');
    }

    function postRegister(Request $kiriman){
        $validator = Validator::make($kiriman->all(), [
            'name' => 'required|min:4',
            'username' => 'required|min:4',
            'email' => 'required|email|unique:pembeli',
            'password' => 'required|min:6|confirmed'
            ]);
            if ($validator->fails()) {
                alert()->error('','Form isian tidak boleh kosong');
                return back();
            }
        // $this->validate($kiriman,[
        //     'name' => 'required|min:4',
        //     'username' => 'required|min:4',
        //     'email' => 'required|email|unique:pembeli',
        //     'password' => 'required|min:6|confirmed'
        // ]);
        pembeli::create([
            'nama' => $kiriman->name,
            'username' => $kiriman->username,
            'email' => $kiriman->email,
            'password' => Hash::make($kiriman->password),
            'alamat' => NULL,
            'no_hp' => NULL,
            'jenis_kelamin' => NULL,
            'remember_token' => NULL
        ]);
        // penjual::create([
        //     'nama' => $kiriman->name,
        //     'username' => $kiriman->username,
        //     'email' => $kiriman->email,
        //     'password' => Hash::make($kiriman->password),
        //     'remember_token' => NULL
        // ]);
        return redirect()->back()->with('success', 'Anda berhasil
        registrasi akun!');
    }
}
