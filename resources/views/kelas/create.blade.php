@extends('layouts.app')

@section('title', 'Tambah Kelas')
@section('header', 'Tambah Kelas')

@section('content')

    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6">

            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf

                <div class="space-y-5">

                    {{-- Kode Kelas --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kode Kelas <span class="text-red-500">*</span></label>
                        <input type="text" name="kode_kelas" value="{{ old('kode_kelas') }}"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('kode_kelas') ? 'border-red-400' : 'border-gray-300' }}"
                               placeholder="Contoh: TI-2024-A">
                        @error('kode_kelas')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nama Kelas --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_kelas" value="{{ old('nama_kelas') }}"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('nama_kelas') ? 'border-red-400' : 'border-gray-300' }}"
                               placeholder="Contoh: Teknik Informatika A">
                        @error('nama_kelas')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tahun Angkatan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Angkatan <span class="text-red-500">*</span></label>
                        <input type="number" name="tahun_angkatan" value="{{ old('tahun_angkatan', date('Y')) }}"
                               min="2000" max="2099"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('tahun_angkatan') ? 'border-red-400' : 'border-gray-300' }}">
                        @error('tahun_angkatan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center gap-3 mt-6 pt-5 border-t">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2 rounded-lg transition">
                        Simpan
                    </button>
                    <a href="{{ route('kelas.index') }}"
                       class="text-sm text-gray-600 hover:text-gray-800 px-4 py-2 rounded-lg border hover:bg-gray-50 transition">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

@endsection