@extends('adminlte::page')

@section('title', 'Daftar Kelas')

@section('content_header')
    <h1>Daftar Kelas</h1>
@stop

@section('content')
    <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $kelas_item)
                <tr>
                    <td>{{ $kelas_item->id_kelas }}</td>
                    <td>{{ $kelas_item->nama_kelas }}</td>
                    <td>{{ $kelas_item->wali_kelas }}</td>
                    <td>
                        <a href="{{ route('kelas.edit', $kelas_item->id_kelas) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kelas.destroy', $kelas_item->id_kelas) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
