<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::withCount('mataKuliahs')
            ->when(request('search'), function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('nip', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(StoreDosenRequest $request)
    {
        Dosen::create($request->validated());

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $dosen->update($request->validated());

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        if ($dosen->mataKuliahs()->exists()) {
            return redirect()
                ->route('dosen.index')
                ->with('error', 'Dosen tidak dapat dihapus karena masih memiliki mata kuliah.');
        }

        $dosen->delete();

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}