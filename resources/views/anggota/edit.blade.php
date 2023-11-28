@extends('layout.app')

@section('title', 'Edit Anggota')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Anggota</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Anggota</h4>
                </div>

                <div class="card-body">
                    <form action="/anggota/{{$anggota->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" class="form-control" value="{{$anggota->kode}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$anggota->nama}}">
                        </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" value="{{$anggota->jenis_kelamin}}">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir"  class="form-control" value="{{$anggota->tempat_lahir}}">
                        </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="telepon">Telepon</label>
                            <input type="number" name="telepon"  class="form-control" value="{{$anggota->telepon}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"  class="form-control" value="{{$anggota->tanggal_lahir}}">
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="alamat"> Alamat</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="18" value="{{$anggota->alamat}}"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control" value="{{$anggota->foto}}">
                        </div>
                        </div>

                    <button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-save"></i>
                    Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection