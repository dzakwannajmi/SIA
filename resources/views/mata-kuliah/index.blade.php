@extends('layouts.app')

@section('title', 'Data Mata Kuliah')
@section('header', 'Data Mata Kuliah')

@section('content')

    <div class="bg-white rounded-xl shadow-sm">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-6 border-b">
            <form method="GET" action="{{ route('mata-kuliah.index') }}" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari kode atau nama mata kuliah..."
                       class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-72">
                <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm px-4 py-2 rounded-lg transition">Cari</button>
                @if(request('search'))
                    <a href="{{ route('mata-kuliah.index') }}" class="text-sm text-gray-500 hover:text-red-500 px-2 py-2 transition">✕</a>
                @endif
            </form>
            <a href="{{ route('mata-kuliah.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition text-center">
                + Tambah Mata Kuliah
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold">No</th>
                        <th class="px-6 py-4 font-semibold">Kode MK</th>
                        <th class="px-6 py-4 font-semibold">Nama Mata Kuliah</th>
                        <th class="px-6 py-4 font-semibold">SKS</th>
                        <th class="px-6 py-4 font-semibold">Semester</th>
                        <th class="px-6 py-4 font-semibold">Dosen</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($mataKuliahs as $index => $mk)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-500">{{ $mataKuliahs->firstItem() + $index }}</td>
                            <td class="px-6 py-4 font-mono text-indigo-600 font-medium">{{ $mk->kode_mk }}</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">{{ $mk->nama_mk }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                    {{ $mk->sks }} SKS
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $mk->semester }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $mk->dosen->nama }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('mata-kuliah.edit', $mk) }}"
                                       class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-medium px-3 py-1.5 rounded-lg transition">Edit</a>
                                    <form action="{{ route('mata-kuliah.destroy', $mk) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium px-3 py-1.5 rounded-lg transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                                <p class="text-4xl mb-2">📖</p>
                                <p>Belum ada data mata kuliah.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($mataKuliahs->hasPages())
            <div class="px-6 py-4 border-t">{{ $mataKuliahs->links() }}</div>
        @endif

    </div>

@endsection