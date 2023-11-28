@extends('layout.app')

@section('title', 'Anggota')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4>Anggota</h4>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Anggota</h4>
                    <div class="card-header-form">
                        <a href="{{ route('anggota.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th>Foto</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($anggota as $agt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('/storage/anggota/' . $agt->foto) }}" class="rounded" style="width: 50px"></td>
                                    <td>{{ $agt->kode }}</td>
                                    <td>{{ $agt->nama }}</td>
                                    <td>{{ $agt->tanggal_lahir }}</td>
                                    <td>
                                        <form action="{{ route('anggota.destroy', $agt->id) }}" method="POST" id="delete-form{{ $agt->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('anggota.edit', $agt->id) }}" class="btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete({{ $agt->id }})"></button>
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
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    <script>
        function confirmDelete(id) {
            event.preventDefault();
            swal({
                title: 'Apakah anda yakin?',
                text: 'Setelah dihapus, Anda tidak dapat memulihkannya!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    document.getElementById('delete-form' + id).submit();
                }
            });
        }
    </script>
@endpush