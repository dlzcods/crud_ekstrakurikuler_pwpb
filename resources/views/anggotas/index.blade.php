@extends('adminlte::page')

@section('title', 'Kelola Anggota Ekstrakurikuler & Organisasi')

@section('content_header')
    <h1>Kelola data Anggota Ekstrakurikuler & Organisasi</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('anggota.create') }}" class="btn btn-success mb-3">Tambah</a>
                    <table class="table table-bordered" id="anggota-table">
                        <thead>
                            <tr>
                                <th style="width: 3rem">No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Mengikuti</th>
                                <th>Peran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggotas as $anggota)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $anggota->nis }}</td>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->kelas }}</td>
                                <td>{{ $anggota->ekskul->nama }}</td>
                                <td>{{ $anggota->peran->nama }}</td>
                                <td>
                                    <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-success mr-1">Edit</a>
                                    <form action="{{ route('anggota.destroy', $anggota->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
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
    $('#anggota-table').DataTable({
        responsive: true
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
    console.log("{{ session('info')['message'] }}")
</script>
@endif
@endsection