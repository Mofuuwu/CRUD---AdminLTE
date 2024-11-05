@extends('adminlte::page') 

@section('content')
    <h2>Daftar Kelas Beserta Jumlah Siswa</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Jumlah Siswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
                <tr>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->jumlah_siswa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
