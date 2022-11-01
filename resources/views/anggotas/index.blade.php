@extends('adminlte::page')

@section('title', 'Kelola Anggota ' . $ekskul->nama)

@section('content_header')
    <h1>Kelola data Anggota {{ $ekskul->nama }}</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('anggota.create', $ekskul->id) }}" class="btn btn-primary m-2">Tambah</a>
                    <a href="{{ route('ekskul.index') }}" class="btn btn-success m-2">Semua Ekskul</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="anggota-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 3rem">No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
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
                                <td>{{ $anggota->perans()->wherePivot('ekskul_id', $ekskul->id)->first()->nama }}</td>
                                <td>
                                    <a href="{{ route('anggota.edit', [
                                        'siswa' => $anggota->id,
                                        'ekskul' => $ekskul->id
                                    ]) }}" class="btn btn-success m-1">Edit</a>
                                    <form action="{{ route('anggota.destroy', [
                                        'siswa' => $anggota->id,
                                        'ekskul' => $ekskul->id
                                    ]) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-dialog-message="Hapus data keanggotaan <strong>{{ $anggota->nama }}</strong>? Ini akan mengeluarkannya dari keanggotaan di <strong>{{ $ekskul->nama }}</strong>. Tindakan ini tidak dapat diurungkan" class="btn btn-danger m-1" onclick="showConfirmDialog(this)">Hapus</button>
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
        responsive: true,
        scrollX: true
    });

    const Toast = Swal.mixin({
        position: 'top-end',
        timer: 3000,
        showConfirmButton: false,
        toast: true
    });


    function showConfirmDialog(elem) {
        Swal.fire({
            title: 'Hapus data ini?',
            html: $(elem).attr('data-dialog-message'),
            showConfirmButton: true,
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus',
            icon: 'warning'
        }).then(result => {
            if (result.isConfirmed) {
                $(elem).parent().submit();
            }
        });
    }
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
