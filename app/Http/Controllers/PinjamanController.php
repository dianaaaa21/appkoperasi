<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\Anggota;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjamans = Pinjaman::with('anggota')->get();
        return view('pinjamans.index', compact('pinjamans'));
    }

    public function create()
    {
        $anggotas = Anggota::all();
        return view('pinjamans.create', compact('anggotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pinjaman'   => 'required|unique:pinjamans,kode_pinjaman',
            'anggota_id'      => 'required|exists:anggotas,id',
            'jumlah_pinjaman' => 'required|numeric|min:0',
            'bunga'           => 'required|numeric|min:0',
            'lama_angsuran'   => 'required|integer|min:1',
            'tanggal_pinjam'  => 'required|date',
            'status'          => 'required|in:Belum Lunas,Lunas',
        ]);

        Pinjaman::create($request->all());

        return redirect()->route('pinjamans.index')->with('success', 'Data pinjaman berhasil ditambahkan.');
    }

    public function show(Pinjaman $pinjaman)
    {
        return view('pinjamans.show', compact('pinjaman'));
    }

    public function edit(Pinjaman $pinjaman)
    {
        $anggotas = Anggota::all();
        return view('pinjamans.edit', compact('pinjaman', 'anggotas'));
    }

    public function update(Request $request, Pinjaman $pinjaman)
    {
        $request->validate([
            'kode_pinjaman'   => 'required|unique:pinjamans,kode_pinjaman,' . $pinjaman->id,
            'anggota_id'      => 'required|exists:anggotas,id',
            'jumlah_pinjaman' => 'required|numeric|min:0',
            'bunga'           => 'required|numeric|min:0',
            'lama_angsuran'   => 'required|integer|min:1',
            'tanggal_pinjam'  => 'required|date',
            'status'          => 'required|in:Belum Lunas,Lunas',
        ]);

        $pinjaman->update($request->all());

        return redirect()->route('pinjamans.index')->with('success', 'Data pinjaman berhasil diperbarui.');
    }

    public function destroy(Pinjaman $pinjaman)
    {
        $pinjaman->delete();

        return redirect()->route('pinjamans.index')->with('success', 'Data pinjaman berhasil dihapus.');
    }
}