<?php

namespace App\Http\Controllers\be\pemeriksaan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ConPemeriksaan extends Controller
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
        return view('be.pages.pemeriksaan.index', compact('getPasien'));
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
        return view('be.pages.pemeriksaan.add', compact('getPasien'));
    }

    public function show($id)
    {
        $userId     = base64_decode($id);
        $getUser    = DB::table('user')->where('id', $userId)->select('nm_lengkap', 'nik', 'tgl_lahir')->first();
        $pemeriksaan    = DB::table('pemeriksaan')->where('user_id', $userId);

        $getPemeriksaan = $pemeriksaan->orderBy('created_at', 'desc')->get();
        $pemeriksaanAmount = $pemeriksaan->count();
        return view('be.pages.pemeriksaan.show', compact('getPemeriksaan', 'getUser', 'pemeriksaanAmount'));
    }

    public function edit($id)
    {
        $wawanId = base64_decode($id);
        $role = 'pasien';

        $getPasien = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->join('pemeriksaan', 'user.id', '=', 'pemeriksaan.user_id')
            ->select('user.id', 'user.nm_lengkap')
            ->where('autentikasi.role', $role)->where('pemeriksaan.id', $wawanId)->first();

        $getPemeriksaan = DB::table('pemeriksaan')->where('id', $wawanId)->first();
        return view('be.pages.pemeriksaan.edit', compact('getPemeriksaan', 'getPasien'));
    }

    public function act_add(Request $request)
    {
        $userId = $request->user_id;
        $tglInput = $request->tgl_input;

        $keluhanUtama  = $request->keluhan_utama;
        $tkDarah       = $request->tekanan_darah;
        $bb            = $request->bb;
        $gulaDarah     = $request->gula_darah;
        $sistol        = $request->sistol;
        $diastol       = $request->diastol;
        $kolesterol    = $request->kolesterol;
        $asamUrat      = $request->asam_urat;

        $dataAdd = array(
            'user_id'       => $userId,
            'tgl_input'     => $tglInput,
            'keluhan_utama' => $keluhanUtama,
            'tekanan_darah' => $tkDarah,
            'bb'            => $bb,
            'gula_darah'    => $gulaDarah,
            'sistol'        => $sistol,
            'diastol'       => $diastol,
            'kolesterol'    => $kolesterol,
            'asam_urat'     => $asamUrat,
        );

        $validasi = $this->validate($request, [
            'user_id'       => 'required',
            'tgl_input'     => 'required',
            'keluhan_utama' => 'required',
            'tekanan_darah' => 'required',
            'bb'            => 'required',
            'gula_darah'    => 'required',
            'sistol'        => 'required',
            'diastol'       => 'required',
            'kolesterol'    => 'required',
            'asam_urat'     => 'required',
        ]);

        if ($validasi) {
            // check id user apakah ada
            $checkId = DB::table('user')->where('id', $userId)->count();
            if ($checkId > 0) {
                // cek apakah user sudah melakukan tambah pemeriksaan pada tanggal tersebut
                $checkPemeriksaan = DB::table('pemeriksaan')
                    ->where('user_id', $userId)
                    ->where('tgl_input', $tglInput)->count();
                if ($checkPemeriksaan > 0) {
                    return redirect()->back()->with('failed', 'Pasien sudah menambah data pemeriksaan hari ini!');
                } else {
                    DB::table('pemeriksaan')->insert($dataAdd);
                    return redirect()->route('be.pemeriksaan.list')->with('success', 'Data pemeriksaan berhasil ditambahkan!');
                }
            } else {
                return redirect()->back()->with('failed', 'Pasien tidak ditemukan!');
            }
        }
    }

    public function act_edit(Request $request)
    {
        $pemeriksaanId = $request->pemeriksaan_id;
        $userId = $request->user_id;
        $tglInput = $request->tgl_input;

        $keluhanUtama  = $request->keluhan_utama;
        $tkDarah       = $request->tekanan_darah;
        $bb            = $request->bb;
        $gulaDarah     = $request->gula_darah;
        $sistol        = $request->sistol;
        $diastol       = $request->diastol;
        $kolesterol    = $request->kolesterol;
        $asamUrat      = $request->asam_urat;

        $dataAdd = array(
            'user_id'       => $userId,
            'tgl_input'     => $tglInput,
            'keluhan_utama' => $keluhanUtama,
            'tekanan_darah' => $tkDarah,
            'bb'            => $bb,
            'gula_darah'    => $gulaDarah,
            'sistol'        => $sistol,
            'diastol'       => $diastol,
            'kolesterol'    => $kolesterol,
            'asam_urat'     => $asamUrat,
        );

        $validasi = $this->validate($request, [
            'user_id'       => 'required',
            'tgl_input'     => 'required',
            'keluhan_utama' => 'required',
            'tekanan_darah' => 'required',
            'bb'            => 'required',
            'gula_darah'    => 'required',
            'sistol'        => 'required',
            'diastol'       => 'required',
            'kolesterol'    => 'required',
            'asam_urat'     => 'required',
        ]);

        if ($validasi) {
            // cek id pemeriksaan
            $chekId = DB::table('pemeriksaan')->where('id', $pemeriksaanId)->count();
            if ($chekId > 0) {
                // check id user apakah ada
                $checkIdUser = DB::table('user')->where('id', $userId)->count();
                if ($checkIdUser > 0) {
                    $chekChanges = DB::table('pemeriksaan')
                        ->where('user_id', $userId)
                        ->where('tgl_input', $tglInput)
                        ->where('keluhan_utama', $keluhanUtama)
                        ->where('tekanan_darah', $tkDarah)
                        ->where('bb', $bb)
                        ->where('gula_darah', $gulaDarah)
                        ->where('sistol', $sistol)
                        ->where('diastol', $diastol)
                        ->where('kolesterol', $kolesterol)
                        ->where('asam_urat', $asamUrat)
                        ->count();
                    if ($chekChanges > 0) {
                        return redirect()->back()->with('failed', 'Data pemeriksaan tidak ada perubahan!');
                    } else {
                        // cek id pemeriksaan dan id pasien
                        $checkIdUserAndPemeriksaan = DB::table('pemeriksaan')->where('id', $pemeriksaanId)->where('user_id', $userId)->count();
                        if ($checkIdUserAndPemeriksaan > 0) {
                            $queryUpdate = DB::table('pemeriksaan')->where('id', $pemeriksaanId)->update($dataAdd);
                            return redirect()->back()->with('success', 'Data pemeriksaan berhasil diubah!');
                        } else {
                            return redirect()->back()->with('failed', 'Gagal mengubah data!');
                        }
                    }
                } else {
                    return redirect()->back()->with('failed', 'Pasien tidak ditemukan!');
                }
            } else {
                return redirect()->back()->with('failed', 'Data pemeriksaan tidak ditemukan!');
            }
        }
    }

    public function act_delete(Request $request)
    {
        $pemeriksaanId = $request->pemeriksaan_id;

        if ($pemeriksaanId == null) {
            return redirect()->back()->with('failed', 'Data pemeriksaan tidak ditemukan!');
        } else {
            // cek apakah id teradaftar atau tidak
            $checkId = DB::table('pemeriksaan')->where('id', $pemeriksaanId)->count();
            if ($checkId > 0) {
                DB::table('pemeriksaan')->where('id', $pemeriksaanId)->delete();
                return redirect()->back()->with('success', 'Data pemeriksaan berhasil dihapus!');
            } else {
                return redirect()->back()->with('failed', 'Data pemeriksaan tidak ditemukan!');
            }
        }
    }
}
