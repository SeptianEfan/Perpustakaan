<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\Penerbit;
// use App\Models\Buku;

class DashboardController extends Controller
{

    public function index()
    {
        $anggota = Anggota::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        // $buku = buku::all();
        return view('dashboard.index', compact('anggota','kategori','penerbit'));
    }
}