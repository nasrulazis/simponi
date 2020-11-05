<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        return view('index');
    }

    public function login()
    {
        return view('home');
    }

    public function katalog()
    {
        return view('katalog');
    }

    public function admin()
    {
        $pertumbuhan_tanaman = DB::table('pertumbuhan_tanaman')->get();
        return view('admin', ['pertumbuhan_tanaman' => $pertumbuhan_tanaman]);
    }
}