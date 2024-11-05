<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{


    // Menampilkan daftar siswa
    public function index()
    {
        $siswas = Siswa::with('kelas')->get(); // Mengambil semua data siswa beserta kelasnya
        return view('siswa.index', compact('siswas'));
    }

    // Menampilkan form tambah siswa
    public function create()
    {
        $kelas = Kelas::all(); // Mengambil semua data kelas
        return view('siswa.create', compact('kelas'));
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required|max:255',
            'nis' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'id_kelas' => 'required|max:255',
        ]);

        $siswa = new Siswa();
        $siswa->nama_siswa = $validatedData['nama_siswa'];
        $siswa->nis = $validatedData['nis'];
        $siswa->tanggal_lahir = $validatedData['tanggal_lahir'];
        $siswa->id_kelas = $validatedData['id_kelas'];
        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'siswa created successfully.');
    }

    // Menampilkan form edit siswa
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); // Mengambil data siswa berdasarkan ID
        $kelas = Kelas::all(); // Mengambil semua data kelas
        return view('siswa.edit', compact('siswa', 'kelas'));
        
        // return view('kelas.edit', ['kelas' => $kelas]);
    }

    // Mengupdate data siswa
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required|max:255',
            'nis' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'id_kelas' => 'required|max:255',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->nama_siswa = $validatedData['nama_siswa'];
        $siswa->nis = $validatedData['nis'];
        $siswa->tanggal_lahir = $validatedData['tanggal_lahir'];
        $siswa->id_kelas = $validatedData['id_kelas'];
        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'siswa updated successfully.');
    }

    // Menghapus data siswa
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete(); // Menghapus data siswa

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
