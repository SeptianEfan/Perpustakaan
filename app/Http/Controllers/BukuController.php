<?php

namespace App\Http\Controllers;
use App\Models\buku;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.create', compact('kategori','penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('gambar');
        $image ->storeAs('public/buku',$image->hashName());
        buku::create([
          'kode'=> $request->kode,
          'judul'=> $request->judul,
          'kategori_id'=> $request->kategori_id,
          'penerbit_id'=> $request->penerbit_id,
          'isbn'=> $request->isbn,
          'pengarang'=> $request->pengarang,
          'jumlah_halaman'=> $request->jumlah_halaman,
          'stok'=> $request->stok,
          'tahun_terbit'=> $request->tahun_terbit,
          'sinopsis'=> $request->sinopsis,
          'gambar'=> $image->hashName(),
        ]);

        // $anggota = new Anggota;
       

        // Anggota::create($request->all());

        return redirect('buku')->with('sukses', 'Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
