@extends('adminlte::page')

@section('title', 'Edit Anggota ' . $ekskul->nama)

@section('content_header')
    <h1>Edit data Anggota {{ $ekskul->nama }}</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('anggota.index', $ekskul->id) }}" class="btn btn-success">Kembali</a>
                </div>
                <form action="{{ route('anggota.update', [
                    'ekskul' => $ekskul->id,
                    'siswa' => $siswa->id
                ]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="siswa_id" class="form-label">Pilih Siswa:</label>
                            <select name="siswa_id" id="siswa_id" class="form-control" readonly>
                                <option value="{{ $siswa->id }}">{{ $siswa->nis }} - {{ $siswa->nama }}</option>
                            </select>
                            @error('anggota_id') <span class="text-danger text-italic">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="ekskul_id" class="form-label">Orges yang Diikuti:</label>
                            <select name="ekskul_id" id="ekskul_id" class="form-control" readonly>
                                <option value="{{ $ekskul->id }}">{{ $ekskul->nama }}</option>
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
