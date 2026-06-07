@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')
@section('header', 'Tambah Mata Kuliah')

@section('content')

    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ route('mata-kuliah.store') }}" method="POST">
                @csrf
                <div class="space-y-5">

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kode MK <span class="text-red-500">*</span></label>
                            <input type="text" name="kode_mk" value="{{ old('kode_mk') }}"
                                   class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                          {{ $errors->has('kode_mk') ? 'border-red-400' : 'border-gray-300' }}"
                                   placeholder="Contoh: IF101">
                            @error('kode_mk') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">SKS <span class="text-red-500">*</span></label>
                            <input type="number" name="sks" value="{{ old('sks') }}" min="1" max="6"
                                   class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                          {{ $errors->has('sks') ? 'border-red-400' : 'border-gray-300' }}">
                            @error('sks') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Mata Kuliah <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_mk" value="{{ old('nama_mk') }}"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('nama_mk') ? 'border-red-400' : 'border-gray-300' }}"
                               placeholder="Contoh: Pemrograman Web">
                        @error('nama_mk') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Semester <span class="text-red-500">*</span></label>
                        <select name="semester"
                                class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                       {{ $errors->has('semester') ? 'border-red-400' : 'border-gray-300' }}">
                            <option value="">-- Pilih Semester --</option>
                            @foreach (range(1, 8) as $sem)
                                <option value="Semester {{ $sem }}" {{ old('semester') == "Semester $sem" ? 'selected' : '' }}>
                                    Semester {{ $sem }}
                                </option>
                            @endforeach
                        </select>
                        @error('semester') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Dosen Pengampu <span class="text-red-500">*</span></label>
                        <select name="dosen_id"
                                class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                       {{ $errors->has('dosen_id') ? 'border-red-400' : 'border-gray-300' }}">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{ $dosen->id }}" {{ old('dosen_id') == $dosen->id ? 'selected' : '' }}>
                                    {{ $dosen->nama }} ({{ $dosen->nip }})
                                </option>
                            @endforeach
                        </select>
                        @error('dosen_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>

                <div class="flex items-center gap-3 mt-6 pt-5 border-t">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2 rounded-lg transition">Simpan</button>
                    <a href="{{ route('mata-kuliah.index') }}"
                       class="text-sm text-gray-600 hover:text-gray-800 px-4 py-2 rounded-lg border hover:bg-gray-50 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>

@endsection