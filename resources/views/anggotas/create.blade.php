@extends('adminlte::page')

@section('title', 'Tambah Anggota Ekstrakurikuler & Organisasi')

@section('content_header')
    <h1>Tambah data Anggota Ekstrakurikuler & Organisasi</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('anggota.index') }}" class="btn btn-success">Kembali</a>
                </div>
                <form action="{{ route('anggota.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nis" class="form-label">NIS:</label>
                            <input type="number" name="nis" id="nis" class="form-control">
                            @error('nis') <span class="text-danger text-italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                            @error('nama') <span class="text-danger text-italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas" class="form-label">Kelas:</label>
                            <input type="text" name="kelas" id="kelas" class="form-control">
                            @error('kelas') <span class="text-danger text-italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="ekskul_id" class="form-label">Orges yang Diikuti:</label>
                            <select name="ekskul_id" id="ekskul_id" class="form-control">
                                @foreach($ekskuls as $ekskul)
                                <option value="{{ $ekskul->id }}">{{ $ekskul->nama }}</option>
                                @endforeach
                            </select>
                            @error('ekskul_id') <span class="text-danger text-italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="peran_id" class="form-label">Peran Dalam Orges:</label>
                            <select name="peran_id" id="peran_id" class="form-control">
                                @foreach($perans as $peran)
                                <option value="{{ $peran->id }}">{{ $peran->nama }}</option>
                                @endforeach
                            </select>
                            @error('peran_id') <span class="text-danger text-italic">{{ $message }}</span> @enderror
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