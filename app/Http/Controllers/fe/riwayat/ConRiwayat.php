<?php

namespace App\Http\Controllers\fe\riwayat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ConRiwayat extends Controller
{
    public function index()
    {
        $userId     = session()->get('user_session')['user_id'];
        $getUser    = DB::table('user')->where('id', $userId)->select('nm_lengkap', 'nik', 'tgl_lahir')->first();
        $riwayat    = DB::table('riwayat')->where('user_id', $userId);

        $getRiwayat = $riwayat->orderBy('created_at', 'desc')->get();
        $riwayatAmount = $riwayat->count();

        return view('fe.pages.riwayat.index', compact('getRiwayat', 'getUser', 'riwayatAmount'));
    }
}
