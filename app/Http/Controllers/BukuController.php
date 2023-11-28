<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Http\Request;
use PDF;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();

        return view('buku.index', compact('buku','kategori' ,'penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $buku = Buku::all();
        return view('buku.create',  compact('kategori','penerbit','buku'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'kategori_id' => 'required|integer',
        //     'penerbit_id' => 'required|integer'
        // ]);
        // Tipe::findOrFail($id)->update($request->only(['kategori_id', 'penerbit_id']));
        
        $image = $request->file('gambar');
        $image ->storeAs('public/buku',$image->hashName());
        Buku::create([
          'kode'=> $request->kode,
          'judul'=> $request->judul,
          'kategori_id'=> $request->kategori_id,
          'penerbit_id'=> $request->penerbit_id,
          'isbn'=> $request->isbn,
          'pengarang'=> $request->pengarang,
          'jumlah_halaman'=> $request->jumlah_halaman,
          'stok'=> $request->stok,
          'tahun_terbit'=> $request->tahun_terbit, 
          'sinopis'=> $request->sinopis, 
          'gambar'=> $image->hashName(),
        ]);

        return redirect('buku')->with('sukses', 'Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();

        return view('buku.edit', compact('buku', 'kategori', 'penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('gambar');
        $image->storeAs('public/buku', $image->hashName());

        $buku = Buku::find($id);
        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->kategori_id = $request->kategori_id;
        $buku->penerbit_id = $request->penerbit_id;
        $buku->isbn = $request->isbn;
        $buku->pengarang = $request->pengarang;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->stok = $request->stok;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->sinopis = $request->sinopis;
        $buku->gambar = $image->hashName();
        $buku->Update();

        return redirect('buku')->with('sukses', 'Data berhasil di Update');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('buku')->with('sukses', 'Data berhasil di hapus');
    }
}
