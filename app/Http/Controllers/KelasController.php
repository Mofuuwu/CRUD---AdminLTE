<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{

    // Menampilkan daftar kelas
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    // Menampilkan form tambah kelas
    public function create()
    {
        return view('kelas.create');
    }

    // Menyimpan data kelas baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|max:255',
            'wali_kelas' => 'required|max:255',
        ]);

        $kelas = new Kelas();
        $kelas->nama_kelas = $validatedData['nama_kelas'];
        $kelas->wali_kelas = $validatedData['wali_kelas'];
        $kelas->save();

        return redirect()->route('kelas.index')->with('success', 'kelas created successfully.');
    }

    // Menampilkan form edit kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', ['kelas' => $kelas]);
    }

    // Mengupdate data kelas
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|max:255',
            'wali_kelas' => 'required|max:255'
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->nama_kelas = $validatedData['nama_kelas'];
        $kelas->wali_kelas = $validatedData['wali_kelas'];
        $kelas->save();

        return redirect()->route('kelas.index')->with('success', 'kelas updated successfully.');
    }

    // Menghapus kelas
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'kelas deleted successfully.');
    }
}
