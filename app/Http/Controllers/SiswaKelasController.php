<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SiswaKelasController extends Controller
{
    //INNER JOIN
    public function siswaWithClass()
    {
        $siswas = DB::table('siswas')
            ->join('kelas', 'siswas.id_kelas', '=', 'kelas.id_kelas')
            ->select('siswas.*', 'kelas.*')
            ->get();

        return view('siswa.index_with_class', compact('siswas'));
    }

    // LEFT JOIN
    public function kelasWithSiswa()
    {
        $kelas = DB::table('kelas')
            ->leftJoin('siswas', 'kelas.id_kelas', '=', 'siswas.id_kelas')
            ->select('kelas.*', DB::raw('COUNT(siswas.id_siswa) as jumlah_siswa'))
            ->groupBy('kelas.id_kelas', 'kelas.nama_kelas')
            ->get();

        return view('kelas.index_with_siswa', compact('kelas'));
    }
}