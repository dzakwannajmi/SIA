@extends('layouts.app')

@section('title', 'Input Nilai')
@section('header', 'Input Nilai Mahasiswa')

@section('content')

    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6">

            {{-- Grade Info Box --}}
            <div class="bg-blue-50 border border-blue-200 rounded-lg px-4 py-3 mb-6 text-sm text-blue-800">
                <p class="font-semibold mb-1">Formula Nilai Akhir:</p>
                <p>(Tugas × 30%) + (UTS × 35%) + (UAS × 35%)</p>
                <p class="mt-1 text-xs text-blue-600">Grade: A ≥ 85 | B ≥ 70 | C ≥ 55 | D ≥ 40 | E &lt; 40</p>
            </div>

            <form action="{{ route('nilai.store') }}" method="POST">
                @csrf
                <div class="space-y-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mahasiswa <span class="text-red-500">*</span></label>
                        <select name="mahasiswa_id"
                                class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                       {{ $errors->has('mahasiswa_id') ? 'border-red-400' : 'border-gray-300' }}">
                            <option value="">-- Pilih Mahasiswa --</option>
                            @foreach ($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->id }}" {{ old('mahasiswa_id') == $mahasiswa->id ? 'selected' : '' }}>
                                    {{ $mahasiswa->nama }} — {{ $mahasiswa->nim }} ({{ $mahasiswa->kelas->nama_kelas }})
                                </option>
                            @endforeach
                        </select>
                        @error('mahasiswa_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mata Kuliah <span class="text-red-500">*</span></label>
                        <select name="mata_kuliah_id"
                                class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                       {{ $errors->has('mata_kuliah_id') ? 'border-red-400' : 'border-gray-300' }}">
                            <option value="">-- Pilih Mata Kuliah --</option>
                            @foreach ($mataKuliahs as $mk)
                                <option value="{{ $mk->id }}" {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                                    {{ $mk->nama_mk }} ({{ $mk->kode_mk }}) — {{ $mk->dosen->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('mata_kuliah_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nilai Tugas <span class="text-red-500">*</span></label>
                            <input type="number" name="nilai_tugas" value="{{ old('nilai_tugas') }}"
                                   min="0" max="100" step="0.01"
                                   class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                          {{ $errors->has('nilai_tugas') ? 'border-red-400' : 'border-gray-300' }}"
                                   placeholder="0–100">
                            @error('nilai_tugas') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nilai UTS <span class="text-red-500">*</span></label>
                            <input type="number" name="nilai_uts" value="{{ old('nilai_uts') }}"
                                   min="0" max="100" step="0.01"
                                   class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                          {{ $errors->has('nilai_uts') ? 'border-red-400' : 'border-gray-300' }}"
                                   placeholder="0–100">
                            @error('nilai_uts') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nilai UAS <span class="text-red-500">*</span></label>
                            <input type="number" name="nilai_uas" value="{{ old('nilai_uas') }}"
                                   min="0" max="100" step="0.01"
                                   class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                          {{ $errors->has('nilai_uas') ? 'border-red-400' : 'border-gray-300' }}"
                                   placeholder="0–100">
                            @error('nilai_uas') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                </div>

                <div class="flex items-center gap-3 mt-6 pt-5 border-t">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2 rounded-lg transition">Simpan Nilai</button>
                    <a href="{{ route('nilai.index') }}"
                       class="text-sm text-gray-600 hover:text-gray-800 px-4 py-2 rounded-lg border hover:bg-gray-50 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>

@endsection