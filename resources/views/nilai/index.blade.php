@extends('layouts.app')

@section('title', 'Data Nilai')
@section('header', 'Data Nilai')

@section('content')

    <div class="bg-white rounded-xl shadow-sm">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-6 border-b">
            <form method="GET" action="{{ route('nilai.index') }}" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama/NIM mahasiswa atau mata kuliah..."
                       class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-80">
                <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm px-4 py-2 rounded-lg transition">Cari</button>
                @if(request('search'))
                    <a href="{{ route('nilai.index') }}" class="text-sm text-gray-500 hover:text-red-500 px-2 py-2 transition">✕</a>
                @endif
            </form>
            <a href="{{ route('nilai.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition text-center">
                + Input Nilai
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold">No</th>
                        <th class="px-6 py-4 font-semibold">Mahasiswa</th>
                        <th class="px-6 py-4 font-semibold">Kelas</th>
                        <th class="px-6 py-4 font-semibold">Mata Kuliah</th>
                        <th class="px-6 py-4 font-semibold text-center">Tugas</th>
                        <th class="px-6 py-4 font-semibold text-center">UTS</th>
                        <th class="px-6 py-4 font-semibold text-center">UAS</th>
                        <th class="px-6 py-4 font-semibold text-center">Akhir</th>
                        <th class="px-6 py-4 font-semibold text-center">Grade</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($nilais as $index => $nilai)
                        @php
                            $nilaiAkhir  = $nilai->nilai_akhir;
                            $gradeColors = ['A'=>'bg-green-100 text-green-700','B'=>'bg-blue-100 text-blue-700','C'=>'bg-yellow-100 text-yellow-700','D'=>'bg-orange-100 text-orange-700','E'=>'bg-red-100 text-red-700'];
                        @endphp
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-500">{{ $nilais->firstItem() + $index }}</td>
                            <td class="px-6 py-4">
                                <p class="font-medium text-gray-800">{{ $nilai->mahasiswa->nama }}</p>
                                <p class="text-xs text-gray-400 font-mono">{{ $nilai->mahasiswa->nim }}</p>
                            </td>
                            <td class="px-6 py-4 text-gray-600 text-xs">{{ $nilai->mahasiswa->kelas->nama_kelas }}</td>
                            <td class="px-6 py-4 text-gray-700 font-medium">{{ $nilai->mataKuliah->nama_mk }}</td>
                            <td class="px-6 py-4 text-center text-gray-600">{{ $nilai->nilai_tugas }}</td>
                            <td class="px-6 py-4 text-center text-gray-600">{{ $nilai->nilai_uts }}</td>
                            <td class="px-6 py-4 text-center text-gray-600">{{ $nilai->nilai_uas }}</td>
                            <td class="px-6 py-4 text-center font-semibold text-gray-800">{{ number_format($nilaiAkhir, 2) }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-xs font-bold px-2.5 py-1 rounded-full {{ $gradeColors[$nilai->grade] ?? 'bg-gray-100 text-gray-600' }}">
                                    {{ $nilai->grade ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('nilai.edit', $nilai) }}"
                                       class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-xs font-medium px-3 py-1.5 rounded-lg transition">Edit</a>
                                    <form action="{{ route('nilai.destroy', $nilai) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus nilai ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-100 hover:bg-red-200 text-red-700 text-xs font-medium px-3 py-1.5 rounded-lg transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="px-6 py-12 text-center text-gray-400">
                                <p class="text-4xl mb-2">📊</p>
                                <p>Belum ada data nilai.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($nilais->hasPages())
            <div class="px-6 py-4 border-t">{{ $nilais->links() }}</div>
        @endif

    </div>

@endsection