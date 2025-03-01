<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas', compact('kelas'));
    }

    public function create()
    {
        return view('kelas-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'keahlian' => 'required|string|max:255',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'keahlian' => $request->keahlian,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas-edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'keahlian' => 'required|string|max:255',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'keahlian' => $request->keahlian,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
