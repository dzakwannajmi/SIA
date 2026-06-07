@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('breadcrumb', 'Selamat datang, ' . auth()->user()->name)

@section('content')

{{-- ── Stats Cards ── --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

    {{-- Total Mahasiswa --}}
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/60 flex items-center gap-4">
        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center shrink-0">
            <svg style="width:22px;height:22px" class="text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide">Mahasiswa</p>
            <p class="text-3xl font-bold text-slate-800 leading-none mt-1">{{ $stats['total_mahasiswa'] }}</p>
        </div>
    </div>

    {{-- Total Dosen --}}
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/60 flex items-center gap-4">
        <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center shrink-0">
            <svg style="width:22px;height:22px" class="text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide">Dosen</p>
            <p class="text-3xl font-bold text-slate-800 leading-none mt-1">{{ $stats['total_dosen'] }}</p>
        </div>
    </div>

    {{-- Total Mata Kuliah --}}
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/60 flex items-center gap-4">
        <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center shrink-0">
            <svg style="width:22px;height:22px" class="text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
        <div>
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide">Mata Kuliah</p>
            <p class="text-3xl font-bold text-slate-800 leading-none mt-1">{{ $stats['total_mata_kuliah'] }}</p>
        </div>
    </div>

    {{-- Total Kelas --}}
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/60 flex items-center gap-4">
        <div class="w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center shrink-0">
            <svg style="width:22px;height:22px" class="text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
        </div>
        <div>
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide">Kelas</p>
            <p class="text-3xl font-bold text-slate-800 leading-none mt-1">{{ $stats['total_kelas'] }}</p>
        </div>
    </div>

</div>

{{-- ── Bottom Section ── --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- Recent Students --}}
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100">
            <div>
                <h2 class="text-sm font-semibold text-slate-800">Mahasiswa Terbaru</h2>
                <p class="text-xs text-slate-400 mt-0.5">5 pendaftaran terakhir</p>
            </div>
            <a href="{{ route('mahasiswa.index') }}"
               class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                Lihat semua →
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50/60">
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">NIM</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">Kelas</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($recentMahasiswa as $mahasiswa)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-3.5 font-mono text-xs text-indigo-600 font-semibold">{{ $mahasiswa->nim }}</td>
                            <td class="px-6 py-3.5 text-slate-800 font-medium">{{ $mahasiswa->nama }}</td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center bg-slate-100 text-slate-600 text-xs font-medium px-2.5 py-1 rounded-md">
                                    {{ $mahasiswa->kelas->nama_kelas }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center">
                                <p class="text-slate-400 text-sm">Belum ada data mahasiswa.</p>
                                <a href="{{ route('mahasiswa.create') }}"
                                   class="inline-block mt-2 text-indigo-600 text-xs font-semibold hover:underline">
                                    + Tambah sekarang
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Grade Distribution --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100">
            <h2 class="text-sm font-semibold text-slate-800">Distribusi Grade</h2>
            <p class="text-xs text-slate-400 mt-0.5">Rekap semua nilai tercatat</p>
        </div>
        <div class="p-6 space-y-4">
            @php
                $gradeConfig = [
                    'A' => ['color' => 'bg-emerald-500', 'light' => 'bg-emerald-100', 'text' => 'text-emerald-700'],
                    'B' => ['color' => 'bg-blue-500',   'light' => 'bg-blue-100',   'text' => 'text-blue-700'],
                    'C' => ['color' => 'bg-amber-500',  'light' => 'bg-amber-100',  'text' => 'text-amber-700'],
                    'D' => ['color' => 'bg-orange-500', 'light' => 'bg-orange-100', 'text' => 'text-orange-700'],
                    'E' => ['color' => 'bg-red-500',    'light' => 'bg-red-100',    'text' => 'text-red-700'],
                ];
                $totalNilai = $gradeDistribution->sum();
            @endphp

            @if ($gradeDistribution->isEmpty())
                <div class="text-center py-8">
                    <p class="text-slate-400 text-sm">Belum ada data nilai.</p>
                    <a href="{{ route('nilai.create') }}"
                       class="inline-block mt-2 text-indigo-600 text-xs font-semibold hover:underline">
                        + Input nilai sekarang
                    </a>
                </div>
            @else
                @foreach ($gradeDistribution as $grade => $total)
                    @php
                        $config  = $gradeConfig[$grade] ?? ['color'=>'bg-slate-400','light'=>'bg-slate-100','text'=>'text-slate-600'];
                        $percent = $totalNilai > 0 ? round(($total / $totalNilai) * 100) : 0;
                    @endphp
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center justify-center w-6 h-6 rounded-md text-xs font-bold {{ $config['light'] }} {{ $config['text'] }}">
                                    {{ $grade }}
                                </span>
                                <span class="text-xs text-slate-500 font-medium">{{ $total }} mahasiswa</span>
                            </div>
                            <span class="text-xs font-semibold text-slate-700">{{ $percent }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2">
                            <div class="{{ $config['color'] }} h-2 rounded-full transition-all duration-300"
                                 style="width: {{ $percent }}%"></div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>

{{-- ── Quick Actions ── --}}
<div class="mt-5 bg-white rounded-2xl shadow-sm border border-slate-200/60 p-5">
    <h2 class="text-sm font-semibold text-slate-800 mb-4">Aksi Cepat</h2>
    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">

        <a href="{{ route('kelas.create') }}"
           class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-indigo-50 hover:border-indigo-200 border border-transparent transition-all duration-150 group">
            <div class="w-9 h-9 bg-indigo-100 group-hover:bg-indigo-200 rounded-lg flex items-center justify-center transition-colors">
                <svg style="width:18px;height:18px" class="text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-slate-600 group-hover:text-indigo-700">+ Kelas</span>
        </a>

        <a href="{{ route('dosen.create') }}"
           class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-emerald-50 hover:border-emerald-200 border border-transparent transition-all duration-150 group">
            <div class="w-9 h-9 bg-emerald-100 group-hover:bg-emerald-200 rounded-lg flex items-center justify-center transition-colors">
                <svg style="width:18px;height:18px" class="text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-slate-600 group-hover:text-emerald-700">+ Dosen</span>
        </a>

        <a href="{{ route('mata-kuliah.create') }}"
           class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-amber-50 hover:border-amber-200 border border-transparent transition-all duration-150 group">
            <div class="w-9 h-9 bg-amber-100 group-hover:bg-amber-200 rounded-lg flex items-center justify-center transition-colors">
                <svg style="width:18px;height:18px" class="text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-slate-600 group-hover:text-amber-700">+ Mata Kuliah</span>
        </a>

        <a href="{{ route('mahasiswa.create') }}"
           class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-rose-50 hover:border-rose-200 border border-transparent transition-all duration-150 group">
            <div class="w-9 h-9 bg-rose-100 group-hover:bg-rose-200 rounded-lg flex items-center justify-center transition-colors">
                <svg style="width:18px;height:18px" class="text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-slate-600 group-hover:text-rose-700">+ Mahasiswa</span>
        </a>

        <a href="{{ route('nilai.create') }}"
           class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-violet-50 hover:border-violet-200 border border-transparent transition-all duration-150 group">
            <div class="w-9 h-9 bg-violet-100 group-hover:bg-violet-200 rounded-lg flex items-center justify-center transition-colors">
                <svg style="width:18px;height:18px" class="text-violet-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <span class="text-xs font-medium text-slate-600 group-hover:text-violet-700">+ Nilai</span>
        </a>

    </div>
</div>

@endsection