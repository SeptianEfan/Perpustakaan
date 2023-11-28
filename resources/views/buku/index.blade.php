@extends('layout.app')

@section('title, buku')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4>Buku</h4>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Buku</h4>

                    <div class="card-header-form">
                        <a href="{{route('buku.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-stripped" id="table">
                        <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th>Kode</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penerbit</th>
                                <th>ISBN</th>
                                <th>Pengarang</th>
                                <th>Jumlah Halaman</th>
                                <th>Stok</th>
                                <th>Tahun Terbit</th>
                                <th>Sinopsis</th>
                                <th>Gambar</th>
                                <th style="width:15%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($buku as $bk)
                                <tr>
                                    <td>{{($loop->iteration)}}</td>
                                    <td>{!! DNS1D::getBarcodeHTML('$' . $bk->kode, 'C39+', 1, 25) !!}
                                        {{-- Parameter terakhir: panjang barcode --}}
                                        <div style="margin-top: 5px;">{{$bk->kode}}</div></td>
                                    <td>{{$bk->judul}}</td>
                                    <td>{{$bk->kategori_id}}</td>
                                    <td>{{$bk->penerbit_id}}</td>
                                    <td>{{$bk->isbn}}</td>
                                    <td>{{$bk->pengarang}}</td>
                                    <td>{{$bk->jumlah_halaman}}</td>
                                    <td>{{$bk->stok}}</td>
                                    <td>{{$bk->tahun_terbit}}</td>
                                    <td>{{$bk->sinopsis}}</td>
                                    <td><img src="{{asset('/storage/buku/'.$bk->gambar)}}" class="rounded" style="width: 150px"></td>

                                    <td>
                                        <form action="{{route('buku.destroy', $bk->id)}}" method="GET" id="delete-form">
                                            @method('delete')
                                            <a href="{{route('buku.edit', $bk->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete()"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')


        <script>
            $(document).ready(function () {
                $('#table').DataTable();
            });
        </script>


        <script>
            function confirmDelete()
            {
                event.preventDefault();
                swal({
                    title: 'Apakah anda yakin?',
                    text: 'Setelah dihapus, Anda tidak dapat memulihkannya!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('delete-form').submit();
                    }
                });
            }
        </script>
@endpush