<?php

namespace App\Http\Controllers\be\riwayat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ConRiwayat extends Controller
{
    public function index()
    {
        $role = 'pasien';
        $getPasien = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->select(
                'user.*',
            )
            ->where('autentikasi.role', $role)
            ->get();
        return view('be.pages.riwayat.index', compact('getPasien'));
    }

    public function add()
    {
        $role = 'pasien';
        $getPasien = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->select(
                'user.id',
                'user.nm_lengkap',
            )
            ->where('autentikasi.role', $role)
            ->get();
        return view('be.pages.riwayat.add', compact('getPasien'));
    }

    public function show($id)
    {
        $userId     = base64_decode($id);
        $getUser    = DB::table('user')->where('id', $userId)->select('nm_lengkap', 'nik', 'tgl_lahir')->first();
        $riwayat    = DB::table('riwayat')->where('user_id', $userId);

        $getRiwayat = $riwayat->orderBy('created_at', 'desc')->get();
        $riwayatAmount = $riwayat->count();
        return view('be.pages.riwayat.show', compact('getRiwayat', 'getUser', 'riwayatAmount'));
    }

    public function edit($id)
    {
        $riwayatId = base64_decode($id);
        $role = 'pasien';

        $getPasien = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->join('riwayat', 'user.id', '=', 'riwayat.user_id')
            ->select('user.id', 'user.nm_lengkap')
            ->where('autentikasi.role', $role)->where('riwayat.id', $riwayatId)->first();

        $getRiwayat = DB::table('riwayat')->where('id', $riwayatId)->first();
        return view('be.pages.riwayat.edit', compact('getRiwayat', 'getPasien'));
    }

    
    public function act_add(Request $request)
    {
        $userId = $request->user_id;
        $tglInput = $request->tgl_input;

        $rSakitKel     = $request->r_sakit_kel;
        $rSakitMan     = $request->r_sakit_man;
        $statusKesTer  = $request->stat_kes_bln_ter;
        $statusKesSkrg = $request->stat_kes_bln_skrg;
        $tb            = $request->tb;
        $bb            = $request->bb;
        $gulaDarah     = $request->gula_darah;
        $tkDarah       = $request->tekanan_darah;
        $kolesterol    = $request->kolesterol;
        $asamUrat      = $request->asam_urat;

        $dataAdd = array(
            'user_id'           => $userId,
            'tgl_input'         => $tglInput,
            'r_sakit_kel'       => $rSakitKel,
            'r_sakit_man'       => $rSakitMan,
            'stat_kes_bln_ter'  => $statusKesTer,
            'stat_kes_bln_skrg' => $statusKesSkrg,
            'tb'                => $tb,
            'bb'                => $bb,
            'gula_darah'        => $gulaDarah,
            'tekanan_darah'     => $tkDarah,
            'kolesterol'        => $kolesterol,
            'asam_urat'         => $asamUrat,
        );

        $validasi = $this->validate($request, [
            'user_id'           => 'required',
            'tgl_input'         => 'required',
            'r_sakit_kel'       => 'required',
            'r_sakit_man'       => 'required',
            'stat_kes_bln_ter'  => 'required',
            'stat_kes_bln_skrg' => 'required',
            'tb'                => 'required',
            'bb'                => 'required',
            'gula_darah'        => 'required',
            'tekanan_darah'     => 'required',
            'kolesterol'        => 'required',
            'asam_urat'         => 'required',
        ]);

        if ($validasi) {
            // check id user apakah ada
            $checkId = DB::table('user')->where('id', $userId)->count();
            if ($checkId > 0) {
                // cek apakah user sudah melakukan tambah riwayat pada tanggal tersebut
                $checkRiwayat = DB::table('riwayat')
                    ->where('user_id', $userId)
                    ->where('tgl_input', $tglInput)->count();
                if ($checkRiwayat > 0) {
                    return redirect()->back()->with('failed', 'Pasien sudah menambah data riwayat hari ini!');
                } else {
                    DB::table('riwayat')->insert($dataAdd);
                    return redirect()->route('be.riwayat.list')->with('success', 'Data riwayat berhasil ditambahkan!');
                }
            } else {
                return redirect()->back()->with('failed', 'Pasien tidak ditemukan!');
            }
        }
    }

    public function act_edit(Request $request)
    {
        $riwayatId = $request->riwayat_id;
        $userId = $request->user_id;
        $tglInput = $request->tgl_input;

        $rSakitKel     = $request->r_sakit_kel;
        $rSakitMan     = $request->r_sakit_man;
        $statusKesTer  = $request->stat_kes_bln_ter;
        $statusKesSkrg = $request->stat_kes_bln_skrg;
        $tb            = $request->tb;
        $bb            = $request->bb;
        $gulaDarah     = $request->gula_darah;
        $tkDarah       = $request->tekanan_darah;
        $kolesterol    = $request->kolesterol;
        $asamUrat      = $request->asam_urat;

        $dataAdd = array(
            'user_id'           => $userId,
            'tgl_input'         => $tglInput,
            'r_sakit_kel'       => $rSakitKel,
            'r_sakit_man'       => $rSakitMan,
            'stat_kes_bln_ter'  => $statusKesTer,
            'stat_kes_bln_skrg' => $statusKesSkrg,
            'tb'                => $tb,
            'bb'                => $bb,
            'gula_darah'        => $gulaDarah,
            'tekanan_darah'     => $tkDarah,
            'kolesterol'        => $kolesterol,
            'asam_urat'         => $asamUrat,
        );

        $validasi = $this->validate($request, [
            'user_id'           => 'required',
            'tgl_input'         => 'required',
            'r_sakit_kel'       => 'required',
            'r_sakit_man'       => 'required',
            'stat_kes_bln_ter'  => 'required',
            'stat_kes_bln_skrg' => 'required',
            'tb'                => 'required',
            'bb'                => 'required',
            'gula_darah'        => 'required',
            'tekanan_darah'     => 'required',
            'kolesterol'        => 'required',
            'asam_urat'         => 'required',
        ]);

        if ($validasi) {
            // cek id riwayat
            $chekId = DB::table('riwayat')->where('id', $riwayatId)->count();
            if ($chekId > 0) {
                // check id user apakah ada
                $checkIdUser = DB::table('user')->where('id', $userId)->count();
                if ($checkIdUser > 0) {
                    $chekChanges = DB::table('riwayat')
                        ->where('user_id', $userId)
                        ->where('tgl_input', $tglInput)
                        ->where('r_sakit_kel', $rSakitKel)
                        ->where('r_sakit_man', $rSakitMan)
                        ->where('stat_kes_bln_ter', $statusKesTer)
                        ->where('stat_kes_bln_skrg', $statusKesSkrg)
                        ->where('tb', $tb)
                        ->where('bb', $bb)
                        ->where('gula_darah', $gulaDarah)
                        ->where('tekanan_darah', $tkDarah)
                        ->where('kolesterol', $kolesterol)
                        ->where('asam_urat', $asamUrat)
                        ->count();
                    if ($chekChanges > 0) {
                        return redirect()->back()->with('failed', 'Data riwayat tidak ada perubahan!');
                    } else {
                        // cek id riwayat dan id pasien
                        $checkIdUserAndRiwayat = DB::table('riwayat')->where('id', $riwayatId)->where('user_id', $userId)->count();
                        if ($checkIdUserAndRiwayat > 0) {
                            $queryUpdate = DB::table('riwayat')->where('id', $riwayatId)->update($dataAdd);
                            return redirect()->back()->with('success', 'Data riwayat berhasil diubah!');
                        } else {
                            return redirect()->back()->with('failed', 'Gagal mengubah data!');
                        }
                    }
                } else {
                    return redirect()->back()->with('failed', 'Pasien tidak ditemukan!');
                }
            } else {
                return redirect()->back()->with('failed', 'Data riwayat tidak ditemukan!');
            }
        }
    }

    public function act_delete(Request $request)
    {
        $riwayatId = $request->riwayat_id;

        if ($riwayatId == null) {
            return redirect()->back()->with('failed', 'Data riwayat tidak ditemukan!');
        } else {
            // cek apakah id teradaftar atau tidak
            $checkId = DB::table('riwayat')->where('id', $riwayatId)->count();
            if ($checkId > 0) {
                DB::table('riwayat')->where('id', $riwayatId)->delete();
                return redirect()->back()->with('success', 'Data riwayat berhasil dihapus!');
            } else {
                return redirect()->back()->with('failed', 'Data riwayat tidak ditemukan!');
            }
        }
    }
}
