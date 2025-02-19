<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    // Menampilkan form edit petugas
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('edit-petugas', compact('petugas'));
    }

    // Memproses update data petugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'nama_petugas' => 'required|string|max:255',
            'role' => 'required|in:admin,petugas',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->username = $request->username;
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->role = $request->role;

        if ($request->filled('password')) {
            $petugas->password = Hash::make($request->password);
        }

        $petugas->save();

        return redirect()->route('edit.petugas', $id)->with('success', 'Data berhasil diperbarui');
    }
}
