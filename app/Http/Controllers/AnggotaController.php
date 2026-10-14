<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    // Menampilkan daftar data anggota
    public function index()
    {
        $anggotas = Anggota::all();
        return view('anggotas.index', compact('anggotas'));
    }

    // Menampilkan form tambah anggota
    public function create()
    {
        return view('anggotas.create');
    }

    // Menyimpan data anggota baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'kode_anggota'   => 'required|unique:anggotas,kode_anggota',
            'nama'           => 'required|string|max:255',
            'alamat'         => 'required|string',
            'telepon'        => 'required|string|max:15',
            'tanggal_gabung' => 'required|date',
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggotas.index')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    // Menampilkan detail anggota tertentu
    public function show(Anggota $anggota)
    {
        return view('anggotas.show', compact('anggota'));
    }

    // Menampilkan form edit anggota
    public function edit(Anggota $anggota)
    {
        return view('anggotas.edit', compact('anggota'));
    }

    // Memperbarui data anggota di database
    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'kode_anggota'   => 'required|unique:anggotas,kode_anggota,' . $anggota->id,
            'nama'           => 'required|string|max:255',
            'alamat'         => 'required|string',
            'telepon'        => 'required|string|max:15',
            'tanggal_gabung' => 'required|date',
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggotas.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    // Menghapus data anggota
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggotas.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}