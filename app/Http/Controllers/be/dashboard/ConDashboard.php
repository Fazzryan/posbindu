<?php

namespace App\Http\Controllers\be\dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ConDashboard extends Controller
{
    public function index()
    {
        $totPetugas = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->where('autentikasi.role', 'admin')
            ->count();
        $totPasien = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->where('autentikasi.role', 'pasien')
            ->count();
        $totWawancara   = DB::table('wawancara')->count();
        $totPemeriksaan = DB::table('pemeriksaan')->count();
        $totRiwayat     = DB::table('riwayat')->count();

        return view('be.pages.dashboard.index', compact(
            'totPetugas',
            'totPasien',
            'totWawancara',
            'totPemeriksaan',
            'totRiwayat',
        ));
    }
}
