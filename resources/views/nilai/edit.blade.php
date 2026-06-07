@extends('layouts.app')

@section('title', 'Edit Nilai')
@section('header', 'Edit Nilai Mahasiswa')

@section('content')

    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6">

            {{-- Student & Course Info (read-only) --}}
            <div class="bg-gray-50 rounded-lg p-4 mb-6 text-sm">
                <p class="text-gray-500">Mahasiswa</p>
                <p class="font-semibold text-gray-800">{{ $nilai->mahasiswa->nama }} — {{ $nilai->mahasiswa->nim }}</p>
                <p class="text-gray-500 mt-2">Mata Kuliah</p>
                <p class="font-semibold text-gray-800">{{ $nilai->mataKuliah->nama_mk }} ({{ $nilai->mataKuliah->kode_mk }})</p>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-lg px-4 py-3 mb-6 text-sm text-blue-800">
                <p class="font-semibold">Formula:</p>
                <p>(Tugas × 30%) + (UTS × 35%) + (UAS × 35%) → Grade otomatis dihitung</p>
            </div>

            <form action="{{ route('nilai.update', $nilai) }}" method="POST">
                @csrf @method('PUT')
                <div class="grid grid-cols-3 gap-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nilai Tugas <span class="text-red-500">*</span></label>
                        <input type="number" name="nilai_tugas" value="{{ old('nilai_tugas', $nilai->nilai_tugas) }}"
                               min="0" max="100" step="0.01"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('nilai_tugas') ? 'border-red-400' : 'border-gray-300' }}">
                        @error('nilai_tugas') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nilai UTS <span class="text-red-500">*</span></label>
                        <input type="number" name="nilai_uts" value="{{ old('nilai_uts', $nilai->nilai_uts) }}"
                               min="0" max="100" step="0.01"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('nilai_uts') ? 'border-red-400' : 'border-gray-300' }}">
                        @error('nilai_uts') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nilai UAS <span class="text-red-500">*</span></label>
                        <input type="number" name="nilai_uas" value="{{ old('nilai_uas', $nilai->nilai_uas) }}"
                               min="0" max="100" step="0.01"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('nilai_uas') ? 'border-red-400' : 'border-gray-300' }}">
                        @error('nilai_uas') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>

                <div class="flex items-center gap-3 mt-6 pt-5 border-t">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2 rounded-lg transition">Perbarui Nilai</button>
                    <a href="{{ route('nilai.index') }}"
                       class="text-sm text-gray-600 hover:text-gray-800 px-4 py-2 rounded-lg border hover:bg-gray-50 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>

@endsection