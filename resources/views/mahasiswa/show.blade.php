@extends('layouts.app')

@section('title', 'Detail Mahasiswa')
@section('header', 'Detail Mahasiswa')

@section('content')

    <div class="max-w-4xl space-y-6">

        {{-- Student Info Card --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">{{ $mahasiswa->nama }}</h2>
                    <p class="text-indigo-600 font-mono font-medium">{{ $mahasiswa->nim }}</p>
                </div>
                <a href="{{ route('mahasiswa.edit', $mahasiswa) }}"
                   class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-sm font-medium px-4 py-2 rounded-lg transition">
                    Edit Data
                </a>
            </div>

            <div class="grid grid-cols-2 gap-x-8 gap-y-4 text-sm">
                <div>
                    <p class="text-gray-500">Email</p>
                    <p class="text-gray-800 font-medium">{{ $mahasiswa->email }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Kelas</p>
                    <p class="text-gray-800 font-medium">{{ $mahasiswa->kelas->nama_kelas }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Jenis Kelamin</p>
                    <p class="text-gray-800 font-medium">{{ $mahasiswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Telepon</p>
                    <p class="text-gray-800 font-medium">{{ $mahasiswa->telepon ?? '-' }}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-500">Alamat</p>
                    <p class="text-gray-800 font-medium">{{ $mahasiswa->alamat ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Grades Table --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-base font-semibold text-gray-700 mb-4">Rekap Nilai</h3>

            @if ($mahasiswa->nilais->isEmpty())
                <p class="text-gray-400 text-sm text-center py-8">Belum ada data nilai untuk mahasiswa ini.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-gray-500 text-xs uppercase tracking-wider">
                                <th class="px-4 py-3 font-semibold">Mata Kuliah</th>
                                <th class="px-4 py-3 font-semibold text-center">Tugas (30%)</th>
                                <th class="px-4 py-3 font-semibold text-center">UTS (35%)</th>
                                <th class="px-4 py-3 font-semibold text-center">UAS (35%)</th>
                                <th class="px-4 py-3 font-semibold text-center">Nilai Akhir</th>
                                <th class="px-4 py-3 font-semibold text-center">Grade</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($mahasiswa->nilais as $nilai)
                                @php $nilaiAkhir = $nilai->nilai_akhir; @endphp
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 font-medium text-gray-800">{{ $nilai->mataKuliah->nama_mk }}</td>
                                    <td class="px-4 py-3 text-center text-gray-600">{{ $nilai->nilai_tugas }}</td>
                                    <td class="px-4 py-3 text-center text-gray-600">{{ $nilai->nilai_uts }}</td>
                                    <td class="px-4 py-3 text-center text-gray-600">{{ $nilai->nilai_uas }}</td>
                                    <td class="px-4 py-3 text-center font-semibold text-gray-800">{{ number_format($nilaiAkhir, 2) }}</td>
                                    <td class="px-4 py-3 text-center">
                                        @php
                                            $gradeColors = ['A'=>'bg-green-100 text-green-700','B'=>'bg-blue-100 text-blue-700','C'=>'bg-yellow-100 text-yellow-700','D'=>'bg-orange-100 text-orange-700','E'=>'bg-red-100 text-red-700'];
                                            $grade = $nilai->grade ?? '-';
                                        @endphp
                                        <span class="text-xs font-bold px-2.5 py-1 rounded-full {{ $gradeColors[$grade] ?? 'bg-gray-100 text-gray-700' }}">
                                            {{ $grade }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <a href="{{ route('mahasiswa.index') }}"
           class="inline-block text-sm text-gray-600 hover:text-gray-800 border px-4 py-2 rounded-lg hover:bg-gray-50 transition">
            ← Kembali ke Daftar Mahasiswa
        </a>

    </div>

@endsection