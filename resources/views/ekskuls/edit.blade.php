@extends('adminlte::page')

@section('title', 'Edit Ekstrakurikuler & Organisasi')

@section('content_header')
    <h1>Edit data Ekstrakurikuler & Organisasi</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('ekskul.index') }}" class="btn btn-success">Kembali</a>
                </div>
                <form action="{{ route('ekskul.update', $ekskul->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $ekskul->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori" class="form-label">Kategori:</label>
                            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $ekskul->kategori }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_pembina" class="form-label">Nama Pembina:</label>
                            <input type="text" name="nama_pembina" id="nama_pembina" class="form-control" value="{{ $ekskul->nama_pembina }}">
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