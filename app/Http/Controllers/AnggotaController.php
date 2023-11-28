<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    
    public function index()
    {
        $anggota = Anggota::all();
        //dd($anggota);
        return view('anggota.index', compact('anggota'));
    }

    
    public function create()
    {
        return view('anggota.create');
    }

   
    public function store(Request $request)
    {

        $image = $request->file('foto');
        $image ->storeAs('public/anggota',$image->hashName());
        Anggota::create([
          'kode'=> $request->kode,
          'nama'=> $request->nama,
          'tempat_lahir'=> $request->tempat_lahir,
          'jenis_kelamin'=> $request->jenis_kelamin,
          'tanggal_lahir'=> $request->tanggal_lahir,
          'telepon'=> $request->telepon,
          'alamat'=> $request->alamat,
          'foto'=> $image->hashName(),
        ]);

        // $anggota = new Anggota;
       

        // Anggota::create($request->all());

        return redirect('anggota')->with('sukses', 'Data Berhasil Di Simpan');
    }


    
    public function show(anggota $anggota)
    {
        //
    }

    public function edit( $id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', compact('anggota'));
    }


    public function update(Request $request,  $id)
    {
        $anggota = Anggota::find($id);
        $anggota->kode = $request->kode;
        $anggota->nama = $request->nama;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->telepon = $request->telepon;
        // $anggota->alamat = $request->alamat;
        $anggota->foto = $request->foto;
        $anggota->update();

        return redirect('anggota')->with('edit','Edit Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect('anggota')->with('sukses','Data Dihapus ');
    }
}
