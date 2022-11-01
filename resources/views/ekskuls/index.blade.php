@extends('adminlte::page')

@section('title', 'Kelola Ekstrakurikuler & Organisasi')

@section('content_header')
    <h1>Kelola data Ekstrakurikuler & Organisasi</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('ekskul.create') }}" class="btn btn-primary mb-3">Tambah</a>
                    <table class="table table-bordered" id="ekskul-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 3rem">No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Nama Pembina</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ekskuls as $ekskul)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $ekskul->nama }}</td>
                                <td>{{ $ekskul->kategori }}</td>
                                <td>{{ $ekskul->nama_pembina }}</td>
                                <td>
                                    <a href="{{ route('ekskul.edit', $ekskul->id) }}" class="btn btn-success m-1">Edit</a>
                                    <form action="{{ route('ekskul.destroy', $ekskul->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-1">Hapus</button>
                                    </form>
                                    <a href="/ekskul/{{ $ekskul->id }}/anggota" class="btn btn-primary m-1">Anggota</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $('#ekskul-table').DataTable({
        responsive: true,
        scrollX: true
    });

    const Toast = Swal.mixin({
        position: 'top-end',
        timer: 3000,
        showConfirmButton: false,
        toast: true
    });
</script>

@if(session('info'))
<script>
    Toast.fire({
        title: "{{ session('info')['message'] }}",
        icon: "{{ session('info')['type'] }}"
    });
</script>
@endif
@endsection
