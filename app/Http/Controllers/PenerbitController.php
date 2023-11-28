<?php

namespace App\Http\Controllers;

use App\Models\penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //dd($request->all());
        
        $penerbit = new Penerbit;
        $penerbit->kode = $request->kode;
        $penerbit->nama = $request->nama;
        $penerbit->save();

        return redirect('penerbit')->with('sukses', 'Data Berhasil Disimpan');
    }

    
    public function show(penerbit $penerbit)
    {
        //
    }

    
    public function edit(penerbit $id)
    {
        $penerbit = Penerbit::find($id);
        return view('penerbit.edit', compact('penerbit'));
    }

    
    public function update(Request $request, $id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->kode = $request->kode;
        $penerbit->nama = $request->nama;
        $penerbit->update();
        
        return redirect('penerbit')->with('sukses', 'Data Berhasil Diupdate');
    }

    
    public function destroy($id)
    {
        $penerbit = penerbit::find($id);
        $penerbit ->delete();
        return redirect('penerbit')->with('sukses', 'Data Berhasil dihapus');
    }
}
