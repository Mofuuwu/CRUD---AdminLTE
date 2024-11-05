<!-- resources/views/sekolah/kelas/create.blade.php -->
@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Tambah Kelas</h1>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" required>
        </div>

        <div class="form-group">
            <label for="wali_kelas">Wali Kelas</label>
            <input type="text" name="wali_kelas" class="form-control" id="wali_kelas" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
