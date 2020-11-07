<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\katalog;

class PagesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        $katalog = DB::table('katalog')->get();
        return view('index', ['katalog' => $katalog]);
    }

    public function login()
    {
        return view('login');
    }

    public function katalog()
    {
        $katalog= katalog::where('id', $_GET['id'])->get();
        return view('katalog', ['katalog' => $katalog]);
    }
    public function admin()
    {
        $pertumbuhan_tanaman = DB::table('pertumbuhan_tanaman')->get();
        return view('admin', ['pertumbuhan_tanaman' => $pertumbuhan_tanaman]);
    }
    public function daftar()
    {
        return view('auth/register');
    }
}