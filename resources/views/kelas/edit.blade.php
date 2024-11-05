@extends('adminlte::page')

@section('title', 'Edit Kelas')

@section('content_header')
    <h1>Edit Kelas</h1>
@stop

@section('content')
    <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required>
        </div>
        <div class="form-group">
            <label for="nama_kelas">Wali Kelas</label>
            <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" value="{{ $kelas->wali_kelas }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop
