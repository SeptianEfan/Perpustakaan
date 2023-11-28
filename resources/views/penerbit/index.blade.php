@extends ('layout.app')

@section('title','penerbit')

@section('content')
    <section class="section">
            <div class="section-header">
                <h1>Penerbit</h1>
            </div>
            <div class="section-body">
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Penerbit</h4>

                        <div class="card-header-form">
                        <button class="btn btn-sm- btn-success" data-toggle="modal" data-target="#modal-form"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>
                    </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-stripped" id="table">
                            
                            <thead>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($penerbit as $p)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->kode}}</td>
                                <td>{{$p->nama}}</td>
                                <td>
                                    <form action="/penerbit/{{$p->id}}" method="GET"  id="delete-form{{$p->id}}">
                                        @method('delete')
                                        <a href="/kategori/{{$p->id}}/edit" class="btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete(delete-form{{$p->id}})"></button>

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
            @include('penerbit.form')
@endsection

@push('script')
<script>
    $(document).ready(function(){
            $('#table').DataTable();
        });
    function confirmDelete(itemId)
    {
    event.preventDefault();
    swal({
           title: 'Yakin ?',
           text: 'Data ini akan Adios',
           icon: 'warning',
           buttons: true,
           dangerMode: true,
        })
        .then((willDelete)=>{
            if(willDelete){
                document.getElementById('itemId').submit()
            }
        });

    }
</script>
@endpush