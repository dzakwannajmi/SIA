@extends('layouts.app')

@section('title', 'Data Kelas')
@section('header', 'Data Kelas')

@section('content')

    <div class="bg-white rounded-xl shadow-sm">

        {{-- Table Header: Search + Add Button --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-6 border-b">
            <form method="GET" action="{{ route('kelas.index') }}" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari kode atau nama kelas..."
                       class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-64">
                <button type="submit"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm px-4 py-2 rounded-lg transition">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('kelas.index') }}"
                       class="text-sm text-gray-500 hover:text-red-500 px-2 py-2 transition">✕ Reset</a>
                @endif
            </form>
            <a href="{{ route('kelas.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition text-center">
                + Tambah Kelas
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold">No</th>
                        <th class="px-6 py-4 font-semibold">Kode Kelas</th>
                        <th class="px-6 py-4 font-semibold">Nama Kelas</th>
                        <th class="px-6 py-4 font-semibold">Tahun Angkatan</th>
                        <th class="px-6 py-4 font-semibold">Jumlah Mahasiswa</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($kelas as $index => $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-500">{{ $kelas->firstItem() + $index }}</td>
                            <td class="px-6 py-4 font-mono font-medium text-indigo-600">{{ $item->kode_kelas }}</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">{{ $item->nama_kelas }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $item->tahun_angkatan }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-indigo-100 text-indigo-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                    {{ $item->mahasiswas_count }} mahasiswa
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('kelas.edit', $item) }}"
                                       class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-medium px-3 py-1.5 rounded-lg transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('kelas.destroy', $item) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium px-3 py-1.5 rounded-lg transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                                <p class="text-4xl mb-2">🏫</p>
                                <p>Belum ada data kelas{{ request('search') ? ' yang sesuai pencarian' : '' }}.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($kelas->hasPages())
            <div class="px-6 py-4 border-t">
                {{ $kelas->links() }}
            </div>
        @endif

    </div>

@endsection