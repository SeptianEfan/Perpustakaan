@extends('layout.app')

@section('title', 'Kategori')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kategori</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Kategori</h4>
                <div class="card-header-form">
                    <button class="btn btn-sm- btn-success" data-toggle="modal" data-target="#modal-form"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
                </div>
            </div>

            <div class="card-body">
        <table class="table table-stripped" id="table">
            <thead>
                <th style="width: 10%">#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th style="width: 15%">Aksi</th>
            </thead>
            
            <tbody>
                @foreach($kategori as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->kode}}</td>
                    <td>{{$item->nama}}</td>
                    <td>
                    <form action="/kategori/{{$item->id}}" method="GET" id="delete-form{{$item->id}}">
                        @csrf
                        @method('delete')
                        <a href="/kategori/{{$item->id}}/edit" class="btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete(delete-form{{$item->id}})"></button>
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
@include('kategori.form')
@endsection

@push('script')
    <script>
        $(document).ready(function(){
            $('#table').DataTable();
        });
        function confirmDelete(id){
            event.preventDefault();
            swal({
                title : 'Apakah Anda Yakin?',
                text : 'setelah dihapus, Anda tidak dapat memulihkannya!',
                icon : 'warning',
                buttons : true,
                dangerMode : true,
            })
            .then((willDelete) => {
                if (willDelete){
                    document.getElementById('delete-form' + id).submit();
                }
            });
        }
    </script>
    
    @endpush