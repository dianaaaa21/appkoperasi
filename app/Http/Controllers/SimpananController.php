<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\Anggota;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index()
    {
        $simpanans = Simpanan::with('anggota')->get();
        return view('simpanans.index', compact('simpanans'));
    }

    public function create()
    {
        $anggotas = Anggota::all();
        return view('simpanans.create', compact('anggotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_simpanan'  => 'required|unique:simpanans,kode_simpanan',
            'anggota_id'     => 'required|exists:anggotas,id',
            'jenis_simpanan' => 'required|in:Pokok,Wajib,Sukarela',
            'jumlah'         => 'required|numeric|min:0',
            'tanggal'        => 'required|date',
        ]);

        Simpanan::create($request->all());

        return redirect()->route('simpanans.index')->with('success', 'Data simpanan berhasil ditambahkan.');
    }

    public function show(Simpanan $simpanan)
    {
        return view('simpanans.show', compact('simpanan'));
    }

    public function edit(Simpanan $simpanan)
    {
        $anggotas = Anggota::all();
        return view('simpanans.edit', compact('simpanan', 'anggotas'));
    }

    public function update(Request $request, Simpanan $simpanan)
    {
        $request->validate([
            'kode_simpanan'  => 'required|unique:simpanans,kode_simpanan,' . $simpanan->id,
            'anggota_id'     => 'required|exists:anggotas,id',
            'jenis_simpanan' => 'required|in:Pokok,Wajib,Sukarela',
            'jumlah'         => 'required|numeric|min:0',
            'tanggal'        => 'required|date',
        ]);

        $simpanan->update($request->all());

        return redirect()->route('simpanans.index')->with('success', 'Data simpanan berhasil diperbarui.');
    }

    public function destroy(Simpanan $simpanan)
    {
        $simpanan->delete();

        return redirect()->route('simpanans.index')->with('success', 'Data simpanan berhasil dihapus.');
    }
}