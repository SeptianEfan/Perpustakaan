@extends('layout.app')

@section('title', 'Tambah Data Buku')

@section('content')

    <section class="section">
        <div class="section-header">
            <h4>Buku</h4>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Data Buku</h4>
                </div>

                <div class="card-body">
                    <form action="{{route('buku.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="kode">Kode</label>
                                <input type="text" name="kode" id="kode" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="kategori_id">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-control">
                                    <option value="">Piih Kategori</option>
                                    @foreach ($kategori as $kt)
                                        <option value="{{$kt->id}}">{{$kt->nama}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="penerbit_id">Penerbit</label>
                                <select name="penerbit_id" id="penerbit_id" class="form-control">
                                    <option value="">Pilih Penerbit</option>
                                    @foreach ($penerbit as $pb)
                                        <option value="{{$pb->id}}">{{$pb->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="isbn">ISBN</label>
                                <input type="number" name="isbn" id="isbn" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" name="pengarang" id="pengarang" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tahun_terbit">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="jumlah_halaman">Jumlah Halaman</label>
                                <input type="number" name="jumlah_halaman" id="jumlah_halaman" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="sinopsis">Sinopsis</label>
                                <textarea class="form-control" name="sinopsis" id="sinopsis" rows="3"></textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                        </div>

                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Update</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection