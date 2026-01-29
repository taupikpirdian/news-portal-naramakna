<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function index()
    {
        return view('pages.index');
    }

    public function detail()
    {
        return view('pages.detail');
    }

    public function bantuan()
    {
        return view('pages.bantuan');
    }

    public function kerjaSama()
    {
        return view('pages.kerja-sama');
    }

    public function tentangKami()
    {
        return view('pages.tentang-kami');
    }

    public function caraMenulis()
    {
        return view('pages.cara-menulis');
    }
}
