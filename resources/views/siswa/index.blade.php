@extends('adminlte::page')

@section('title', 'Daftar Siswa')

@section('content_header')
    <h1>Daftar Siswa</h1>
@stop

@section('content')
    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->id_siswa }}</td>
                    <td>{{ $siswa->nama_siswa }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->tanggal_lahir }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $siswa->id_siswa) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id_siswa) }}" method="POST" style="display:inline-block;">
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
