@extends('layouts.app')

@section('title', 'Data Dosen')
@section('header', 'Data Dosen')

@section('content')

    <div class="bg-white rounded-xl shadow-sm">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-6 border-b">
            <form method="GET" action="{{ route('dosen.index') }}" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari NIP, nama, atau email..."
                       class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-72">
                <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm px-4 py-2 rounded-lg transition">Cari</button>
                @if(request('search'))
                    <a href="{{ route('dosen.index') }}" class="text-sm text-gray-500 hover:text-red-500 px-2 py-2 transition">✕</a>
                @endif
            </form>
            <a href="{{ route('dosen.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition text-center">
                + Tambah Dosen
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold">No</th>
                        <th class="px-6 py-4 font-semibold">NIP</th>
                        <th class="px-6 py-4 font-semibold">Nama</th>
                        <th class="px-6 py-4 font-semibold">Email</th>
                        <th class="px-6 py-4 font-semibold">Bidang Keahlian</th>
                        <th class="px-6 py-4 font-semibold">Mk. Diajarkan</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($dosens as $index => $dosen)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-500">{{ $dosens->firstItem() + $index }}</td>
                            <td class="px-6 py-4 font-mono text-indigo-600 font-medium">{{ $dosen->nip }}</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">{{ $dosen->nama }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $dosen->email }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $dosen->bidang_keahlian ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                    {{ $dosen->mata_kuliahs_count }} mk
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('dosen.edit', $dosen) }}"
                                       class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-medium px-3 py-1.5 rounded-lg transition">Edit</a>
                                    <form action="{{ route('dosen.destroy', $dosen) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus dosen ini?')">
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
                                <p class="text-4xl mb-2">👨‍🏫</p>
                                <p>Belum ada data dosen.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($dosens->hasPages())
            <div class="px-6 py-4 border-t">{{ $dosens->links() }}</div>
        @endif

    </div>

@endsection