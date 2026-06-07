<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNilaiRequest;
use App\Http\Requests\UpdateNilaiRequest;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with(['mahasiswa.kelas', 'mataKuliah'])
            ->when(request('search'), function ($query, $search) {
                $query->whereHas('mahasiswa', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                      ->orWhere('nim', 'like', "%{$search}%");
                })->orWhereHas('mataKuliah', function ($q) use ($search) {
                    $q->where('nama_mk', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $mahasiswas  = Mahasiswa::with('kelas')->orderBy('nama')->get();
        $mataKuliahs = MataKuliah::with('dosen')->orderBy('nama_mk')->get();

        return view('nilai.create', compact('mahasiswas', 'mataKuliahs'));
    }

    public function store(StoreNilaiRequest $request)
    {
        $validated = $request->validated();

        // Calculate final grade and letter grade
        $nilaiAkhir = ($validated['nilai_tugas'] * 0.30)
                    + ($validated['nilai_uts']   * 0.35)
                    + ($validated['nilai_uas']   * 0.35);

        $validated['grade'] = Nilai::calculateGrade($nilaiAkhir);

        Nilai::create($validated);

        return redirect()
            ->route('nilai.index')
            ->with('success', 'Data nilai berhasil ditambahkan.');
    }

    public function edit(Nilai $nilai)
    {
        $nilai->load(['mahasiswa', 'mataKuliah']);

        return view('nilai.edit', compact('nilai'));
    }

    public function update(UpdateNilaiRequest $request, Nilai $nilai)
    {
        $validated = $request->validated();

        // Recalculate final grade and letter grade on update
        $nilaiAkhir = ($validated['nilai_tugas'] * 0.30)
                    + ($validated['nilai_uts']   * 0.35)
                    + ($validated['nilai_uas']   * 0.35);

        $validated['grade'] = Nilai::calculateGrade($nilaiAkhir);

        $nilai->update($validated);

        return redirect()
            ->route('nilai.index')
            ->with('success', 'Data nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()
            ->route('nilai.index')
            ->with('success', 'Data nilai berhasil dihapus.');
    }
}