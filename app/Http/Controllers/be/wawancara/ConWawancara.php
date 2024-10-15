<?php

namespace App\Http\Controllers\be\wawancara;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ConWawancara extends Controller
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
        return view('be.pages.wawancara.index', compact('getPasien'));
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
        return view('be.pages.wawancara.add', compact('getPasien'));
    }

    public function edit($id)
    {
        // kirim user id nya juga

        $wawanId = base64_decode($id);
        $role = 'pasien';

        $getPasien = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->join('wawancara', 'user.id', '=', 'wawancara.user_id')
            ->select('user.id', 'user.nm_lengkap')
            ->where('autentikasi.role', $role)->where('wawancara.id', $wawanId)->first();

        $getWawan = DB::table('wawancara')->where('id', $wawanId)->first();
        return view('be.pages.wawancara.edit', compact('getWawan', 'getPasien'));
    }

    public function show($id)
    {
        $userId     = base64_decode($id);
        $getUser    = DB::table('user')->where('id', $userId)->select('nm_lengkap', 'nik', 'tgl_lahir')->first();
        $wawancara  = DB::table('wawancara')->where('user_id', $userId);

        $getWawancara = $wawancara->orderBy('created_at', 'desc')->get();
        $wawancaraAmount = $wawancara->count();
        return view('be.pages.wawancara.show', compact('getWawancara', 'getUser', 'wawancaraAmount'));
    }

    public function act_add(Request $request)
    {
        $userId = $request->user_id;
        $tglInput = $request->tgl_input;

        $rSakitKel     = $request->r_sakit_kel;
        $rSakitMan     = $request->r_sakit_man;
        $statusKesTer  = $request->stat_kes_bln_ter;
        $statusKesSkrg = $request->stat_kes_bln_skrg;

        $aktFisik  = $request->aktivitas_fisik;
        $konsSayur = $request->kons_sayur_buah;
        $merokok   = $request->merokok;
        $alkohol   = $request->alkohol;

        $dataAdd = array(
            'user_id'           => $userId,
            'tgl_input'         => $tglInput,
            'r_sakit_kel'       => $rSakitKel,
            'r_sakit_man'       => $rSakitMan,
            'stat_kes_bln_ter'  => $statusKesTer,
            'stat_kes_bln_skrg' => $statusKesSkrg,
            'aktivitas_fisik'   => $aktFisik,
            'kons_sayur_buah'   => $konsSayur,
            'merokok'           => $merokok,
            'alkohol'           => $alkohol,
        );

        $validasi = $this->validate($request, [
            'user_id'           => 'required',
            'tgl_input'         => 'required',
            'r_sakit_kel'       => 'required',
            'r_sakit_man'       => 'required',
            'stat_kes_bln_ter'  => 'required',
            'stat_kes_bln_skrg' => 'required',
            'aktivitas_fisik'   => 'required',
            'kons_sayur_buah'   => 'required',
            'merokok'           => 'required',
            'alkohol'           => 'required',
        ]);

        if ($validasi) {
            // check id user apakah ada
            $checkId = DB::table('user')->where('id', $userId)->count();
            if ($checkId > 0) {
                // cek apakah user sudah melakukan tambah wawancara pada tanggal tersebut
                $checkWawancara = DB::table('wawancara')
                    ->where('user_id', $userId)
                    ->where('tgl_input', $tglInput)->count();
                if ($checkWawancara > 0) {
                    return redirect()->back()->with('failed', 'Pasien sudah menambah data wawancara hari ini!');
                } else {
                    DB::table('wawancara')->insert($dataAdd);
                    return redirect()->route('be.wawancara.list')->with('success', 'Data wawancara berhasil ditambahkan!');
                }
            } else {
                return redirect()->back()->with('failed', 'Pasien tidak ditemukan!');
            }
        }
    }

    public function act_edit(Request $request)
    {
        $wawanId = $request->wawancara_id;

        $userId = $request->user_id;
        $tglInput = $request->tgl_input;

        $rSakitKel     = $request->r_sakit_kel;
        $rSakitMan     = $request->r_sakit_man;
        $statusKesTer  = $request->stat_kes_bln_ter;
        $statusKesSkrg = $request->stat_kes_bln_skrg;

        $aktFisik  = $request->aktivitas_fisik;
        $konsSayur = $request->kons_sayur_buah;
        $merokok   = $request->merokok;
        $alkohol   = $request->alkohol;

        $dataAdd = array(
            'user_id'           => $userId,
            'tgl_input'         => $tglInput,
            'r_sakit_kel'       => $rSakitKel,
            'r_sakit_man'       => $rSakitMan,
            'stat_kes_bln_ter'  => $statusKesTer,
            'stat_kes_bln_skrg' => $statusKesSkrg,
            'aktivitas_fisik'   => $aktFisik,
            'kons_sayur_buah'   => $konsSayur,
            'merokok'           => $merokok,
            'alkohol'           => $alkohol,
        );

        $validasi = $this->validate($request, [
            'user_id'           => 'required',
            'tgl_input'         => 'required',
            'r_sakit_kel'       => 'required',
            'r_sakit_man'       => 'required',
            'stat_kes_bln_ter'  => 'required',
            'stat_kes_bln_skrg' => 'required',
            'aktivitas_fisik'   => 'required',
            'kons_sayur_buah'   => 'required',
            'merokok'           => 'required',
            'alkohol'           => 'required',
        ]);

        if ($validasi) {
            // cek id wawancara
            $chekId = DB::table('wawancara')->where('id', $wawanId)->count();
            if ($chekId > 0) {
                // check id user apakah ada
                $checkIdUser = DB::table('user')->where('id', $userId)->count();
                if ($checkIdUser > 0) {
                    // cek apakah perubahan
                    $chekChanges = DB::table('wawancara')
                        ->where('user_id', $userId)
                        ->where('tgl_input', $tglInput)
                        ->where('r_sakit_kel', $rSakitKel)
                        ->where('r_sakit_man', $rSakitMan)
                        ->where('stat_kes_bln_ter', $statusKesTer)
                        ->where('stat_kes_bln_skrg', $statusKesSkrg)
                        ->where('aktivitas_fisik', $aktFisik)
                        ->where('kons_sayur_buah', $konsSayur)
                        ->where('merokok', $merokok)
                        ->where('alkohol', $alkohol)
                        ->count();
                    if ($chekChanges > 0) {
                        return redirect()->back()->with('failed', 'Data wawancara tidak ada perubahan!');
                        // return redirect()->back()->with('failed', 'Pasien sudah menambah data wawancara hari ini!');
                    } else {
                        // cek id wawan dan id pasien
                        $checkIdUserAndWawan = DB::table('wawancara')->where('id', $wawanId)->where('user_id', $userId)->count();
                        if ($checkIdUserAndWawan > 0) {
                            $queryUpdate = DB::table('wawancara')->where('id', $wawanId)->update($dataAdd);
                            return redirect()->back()->with('success', 'Data wawancara berhasil diubah!');
                        } else {
                            return redirect()->back()->with('failed', 'Gagal mengubah data!');
                        }
                    }
                } else {
                    return redirect()->back()->with('failed', 'Pasien tidak ditemukan!');
                }
            } else {
                return redirect()->back()->with('failed', 'Data wawancara tidak ditemukan!');
            }
        }
    }

    public function act_delete(Request $request)
    {
        $wawanId = $request->wawancara_id;

        if ($wawanId == null) {
            return redirect()->back()->with('failed', 'Data wawancara tidak ditemukan!');
        } else {
            // cek apakah id teradaftar atau tidak
            $checkId = DB::table('wawancara')->where('id', $wawanId)->count();
            if ($checkId > 0) {
                DB::table('wawancara')->where('id', $wawanId)->delete();
                return redirect()->back()->with('success', 'Data wawancara berhasil dihapus!');
            } else {
                return redirect()->back()->with('failed', 'Data wawancara tidak ditemukan!');
            }
        }
    }
}
