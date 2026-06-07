@extends('layouts.app')

@section('title', 'Data Mahasiswa')
@section('header', 'Data Mahasiswa')

@section('content')

    <div class="bg-white rounded-xl shadow-sm">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-6 border-b">
            <form method="GET" action="{{ route('mahasiswa.index') }}" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari NIM, nama, atau email..."
                       class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-72">
                <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm px-4 py-2 rounded-lg transition">Cari</button>
                @if(request('search'))
                    <a href="{{ route('mahasiswa.index') }}" class="text-sm text-gray-500 hover:text-red-500 px-2 py-2 transition">✕</a>
                @endif
            </form>
            <a href="{{ route('mahasiswa.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition text-center">
                + Tambah Mahasiswa
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold">No</th>
                        <th class="px-6 py-4 font-semibold">NIM</th>
                        <th class="px-6 py-4 font-semibold">Nama</th>
                        <th class="px-6 py-4 font-semibold">Email</th>
                        <th class="px-6 py-4 font-semibold">Kelas</th>
                        <th class="px-6 py-4 font-semibold">Jenis Kelamin</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($mahasiswas as $index => $mahasiswa)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-500">{{ $mahasiswas->firstItem() + $index }}</td>
                            <td class="px-6 py-4 font-mono text-indigo-600 font-medium">{{ $mahasiswa->nim }}</td>
                            <td class="px-6 py-4 text-gray-800 font-medium">{{ $mahasiswa->nama }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $mahasiswa->email }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-indigo-100 text-indigo-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                    {{ $mahasiswa->kelas->nama_kelas }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-medium px-2.5 py-1 rounded-full
                                    {{ $mahasiswa->jenis_kelamin === 'L' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' }}">
                                    {{ $mahasiswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('mahasiswa.show', $mahasiswa) }}"
                                       class="bg-blue-100 hover:bg-blue-200 text-blue-700 text-xs font-medium px-3 py-1.5 rounded-lg transition">Detail</a>
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa) }}"
                                       class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-medium px-3 py-1.5 rounded-lg transition">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus mahasiswa ini? Semua data nilai akan ikut terhapus.')">
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
                                <p class="text-4xl mb-2">🎓</p>
                                <p>Belum ada data mahasiswa{{ request('search') ? ' yang sesuai pencarian' : '' }}.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($mahasiswas->hasPages())
            <div class="px-6 py-4 border-t">{{ $mahasiswas->links() }}</div>
        @endif

    </div>

@endsection