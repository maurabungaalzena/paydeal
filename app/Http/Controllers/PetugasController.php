<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    // Menampilkan form tambah petugas
    public function showForm()
    {
        $petugas = Petugas::all();
        return view('tambah-petugas', compact('petugas'));
    }

    // Proses tambah petugas
    public function tambahPetugas(Request $request)
{
    $request->validate([
        'username' => 'required|unique:petugas,username',
        'password' => 'required|min:6',
        'nama_petugas' => 'required',
        'role' => 'required|in:admin,petugas',
    ]);

    // Debugging untuk melihat data yang dikirim

    Petugas::create([
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'nama_petugas' => $request->nama_petugas,
        'role' => $request->role,
    ]);

    return redirect()->route('petugas.form')->with('success', 'Petugas berhasil ditambahkan.');
}


    // **MENAMPILKAN FORM EDIT**
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('edit-petugas', compact('petugas'));
    }

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
            $petugas->password = bcrypt($request->password);
        }

        $petugas->save();

        return redirect()->route('petugas.form')->with('success', 'Data petugas berhasil diperbarui!');
    }

    // Proses hapus petugas
    public function destroy($id)
{
    $petugas = Petugas::findOrFail($id);
    $petugas->delete();

    return redirect()->route('dashboard_petugas')->with('success', 'Petugas berhasil dihapus.');
}

}
