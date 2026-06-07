<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use App\Models\Nilai;

class DashboardController extends Controller
{
    public function index()
    {
        // Aggregate statistics for dashboard cards
        $stats = [
            'total_mahasiswa'   => Mahasiswa::count(),
            'total_dosen'       => Dosen::count(),
            'total_mata_kuliah' => MataKuliah::count(),
            'total_kelas'       => Kelas::count(),
        ];

        // Latest 5 students for recent activity table
        $recentMahasiswa = Mahasiswa::with('kelas')
            ->latest()
            ->take(5)
            ->get();

        // Grade distribution for summary
        $gradeDistribution = Nilai::selectRaw('grade, COUNT(*) as total')
            ->whereNotNull('grade')
            ->groupBy('grade')
            ->orderBy('grade')
            ->pluck('total', 'grade');

        return view('dashboard', compact('stats', 'recentMahasiswa', 'gradeDistribution'));
    }
}