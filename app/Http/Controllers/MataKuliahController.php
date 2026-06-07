<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMataKuliahRequest;
use App\Http\Requests\UpdateMataKuliahRequest;
use App\Models\Dosen;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::with('dosen')
            ->when(request('search'), function ($query, $search) {
                $query->where('nama_mk', 'like', "%{$search}%")
                      ->orWhere('kode_mk', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('mata-kuliah.index', compact('mataKuliahs'));
    }

    public function create()
    {
        $dosens = Dosen::orderBy('nama')->get();

        return view('mata-kuliah.create', compact('dosens'));
    }

    public function store(StoreMataKuliahRequest $request)
    {
        MataKuliah::create($request->validated());

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $mataKuliah)
    {
        $dosens = Dosen::orderBy('nama')->get();

        return view('mata-kuliah.edit', compact('mataKuliah', 'dosens'));
    }

    public function update(UpdateMataKuliahRequest $request, MataKuliah $mataKuliah)
    {
        $mataKuliah->update($request->validated());

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}