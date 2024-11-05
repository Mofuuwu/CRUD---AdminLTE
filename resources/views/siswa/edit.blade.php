@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
    <h1>Edit Siswa</h1>
@stop

@section('content')
    <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
        </div>

        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" required>
        </div>

        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select class="form-control" id="id_kelas" name="id_kelas" required>
                @foreach ($kelas as $kelas_item)
                    <option value="{{ $kelas_item->id_kelas }}" 
                        {{ $siswa->id_kelas == $kelas_item->id_kelas ? 'selected' : '' }}>
                        {{ $kelas_item->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop
