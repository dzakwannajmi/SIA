@extends('layouts.app')

@section('title', 'Tambah Dosen')
@section('header', 'Tambah Dosen')

@section('content')

    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ route('dosen.store') }}" method="POST">
                @csrf
                <div class="space-y-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIP <span class="text-red-500">*</span></label>
                        <input type="text" name="nip" value="{{ old('nip') }}"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('nip') ? 'border-red-400' : 'border-gray-300' }}"
                               placeholder="Nomor Induk Pegawai">
                        @error('nip') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('nama') ? 'border-red-400' : 'border-gray-300' }}">
                        @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full border rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500
                                      {{ $errors->has('email') ? 'border-red-400' : 'border-gray-300' }}">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="Opsional">
                        @error('telepon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bidang Keahlian</label>
                        <input type="text" name="bidang_keahlian" value="{{ old('bidang_keahlian') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="Opsional">
                        @error('bidang_keahlian') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                </div>

                <div class="flex items-center gap-3 mt-6 pt-5 border-t">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2 rounded-lg transition">Simpan</button>
                    <a href="{{ route('dosen.index') }}"
                       class="text-sm text-gray-600 hover:text-gray-800 px-4 py-2 rounded-lg border hover:bg-gray-50 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>

@endsection