@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
    <h1>Tambah Siswa</h1>
@stop

@section('content')
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
        </div>

        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" required>
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>

        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select class="form-control" id="id_kelas" name="id_kelas" required>
                <option value="">Pilih Kelas</option>
                @foreach ($kelas as $kelas_item)
                    <option value="{{ $kelas_item->id_kelas }}">{{ $kelas_item->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop
