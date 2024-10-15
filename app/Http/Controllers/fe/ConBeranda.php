<?php

namespace App\Http\Controllers\fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConBeranda extends Controller
{
    public function index()
    {
        // $session = session()->get('user_session');
        // if ($session) {
        // }
        // $userId = $session['user_id'];
        // $namaLengkap = $session['nm_lengkap'];
        return view('fe.pages.index');
    }
    public function edukasi()
    {
        return view('fe.pages.edukasi');
    }
}
