<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::withCount('mahasiswas')
            ->when(request('search'), function ($query, $search) {
                $query->where('nama_kelas', 'like', "%{$search}%")
                      ->orWhere('kode_kelas', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(StoreKelasRequest $request)
    {
        Kelas::create($request->validated());

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kela)
    {
        // Laravel route model binding: 'kelas' (resource name) -> model variable 'kela'
        return view('kelas.edit', compact('kela'));
    }

    public function update(UpdateKelasRequest $request, Kelas $kela)
    {
        $kela->update($request->validated());

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kela)
    {
        // Prevent deletion if class still has students
        if ($kela->mahasiswas()->exists()) {
            return redirect()
                ->route('kelas.index')
                ->with('error', 'Kelas tidak dapat dihapus karena masih memiliki mahasiswa.');
        }

        $kela->delete();

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}