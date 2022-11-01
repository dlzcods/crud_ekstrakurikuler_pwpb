@extends('adminlte::page')

@section('title', 'Kelola Peran')

@section('content_header')
    <h1>Kelola data Peran</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('peran.create') }}" class="btn btn-success mb-3">Tambah</a>
                    <table class="table table-bordered" id="peran-table">
                        <thead>
                            <tr>
                                <th style="width: 3rem">No</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perans as $peran)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $peran->nama }}</td>
                                <td>
                                    <a href="{{ route('peran.edit', $peran->id) }}" class="btn btn-success mr-1">Edit</a>
                                    <form action="{{ route('peran.destroy', $peran->id) }}" method="post" style="display: inline">
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
    $('#peran-table').DataTable({
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
</script>
@endif
@endsection