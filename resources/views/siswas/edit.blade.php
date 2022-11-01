@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
    <h1>Edit data Siswa</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('siswa.index') }}" class="btn btn-success">Kembali</a>
                </div>
                <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nis" class="form-label">NIS:</label>
                            <input type="text" name="nis" id="nis" class="form-control" value="{{ $siswa->nis }}">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="kelas" class="form-label">Kelas:</label>
                            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $siswa->kelas }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
