@extends('adminlte::page')

@section('content')
    <h2>Daftar Siswa Beserta Kelas</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Wali Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->nama_siswa }}</td>
                    <td>{{ $siswa->nama_kelas }}</td>
                    <td>{{ $siswa->wali_kelas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
