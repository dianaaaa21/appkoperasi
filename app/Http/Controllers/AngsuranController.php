<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    public function index()
    {
        $angsurans = Angsuran::with('pinjaman.anggota')->get();
        return view('angsurans.index', compact('angsurans'));
    }

    public function create()
    {
        $pinjamans = Pinjaman::with('anggota')->get();
        return view('angsurans.create', compact('pinjamans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_angsuran' => 'required|unique:angsurans,kode_angsuran',
            'pinjaman_id'   => 'required|exists:pinjamans,id',
            'jumlah_bayar'  => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'ke_angsuran'   => 'required|integer|min:1',
        ]);

        Angsuran::create($request->all());

        return redirect()->route('angsurans.index')->with('success', 'Data angsuran berhasil ditambahkan.');
    }

    public function show(Angsuran $angsuran)
    {
        return view('angsurans.show', compact('angsuran'));
    }

    public function edit(Angsuran $angsuran)
    {
        $pinjamans = Pinjaman::with('anggota')->get();
        return view('angsurans.edit', compact('angsuran', 'pinjamans'));
    }

    public function update(Request $request, Angsuran $angsuran)
    {
        $request->validate([
            'kode_angsuran' => 'required|unique:angsurans,kode_angsuran,' . $angsuran->id,
            'pinjaman_id'   => 'required|exists:pinjamans,id',
            'jumlah_bayar'  => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'ke_angsuran'   => 'required|integer|min:1',
        ]);

        $angsuran->update($request->all());

        return redirect()->route('angsurans.index')->with('success', 'Data angsuran berhasil diperbarui.');
    }

    public function destroy(Angsuran $angsuran)
    {
        $angsuran->delete();

        return redirect()->route('angsurans.index')->with('success', 'Data angsuran berhasil dihapus.');
    }
}