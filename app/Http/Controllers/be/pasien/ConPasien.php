<?php

namespace App\Http\Controllers\be\pasien;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ConPasien extends Controller
{
    public function index()
    {
        $role = 'pasien';
        $getPasien = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->select(
                'user.id',
                'user.nik',
                'user.tgl_lahir',
                'user.nm_lengkap',
                'autentikasi.role',
            )
            ->where('autentikasi.role', $role)
            ->get();
        return view('be.pages.pasien.index', compact('getPasien'));
    }

    public function show($id)
    {
        $userId = base64_decode($id);
        $getPasien = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->select(
                'user.*',
                'autentikasi.email',
                'autentikasi.password',
            )
            ->where('user.id', $userId)
            ->first();
        // dd($getPasien);
        return view('be.pages.pasien.show', compact('getPasien'));
    }

    public function edit($id)
    {
        $userId = base64_decode($id);
        $getPasien = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->select(
                'user.*',
                'autentikasi.email',
                'autentikasi.password',
            )
            ->where('user.id', $userId)
            ->first();
        // dd($getPasien);
        return view('be.pages.pasien.edit', compact('getPasien'));
    }

    public function act_edit(Request $request)
    {
        $userId = $request->user_id;

        $nmLengkap    = ucwords(strtolower($request->nm_lengkap));
        $nik          = $request->nik;
        $tglLahir     = $request->tgl_lahir;
        $tmpLahir     = ucwords(strtolower($request->tmp_lahir));
        $jenisKelamin = $request->jenis_kelamin;
        $goldar       = ucwords(strtolower($request->goldar));
        $nohp         = $request->no_hp;

        $alamat      = ucwords(strtolower($request->alamat));
        $rt          = $request->rt;
        $rw          = $request->rw;
        $keldes      = ucwords(strtolower($request->keldes));
        $kecamatan   = ucwords(strtolower($request->kecamatan));
        $agama       = $request->agama;
        $statusKawin = $request->status_kawin;

        $dataUser = array(
            'nm_lengkap'    => $nmLengkap,
            'nik'           => $nik,
            'tgl_lahir'     => $tglLahir,
            'tmp_lahir'     => $tmpLahir,
            'jenis_kelamin' => $jenisKelamin,
            'goldar'        => $goldar,
            'no_hp'         => $nohp,
            'alamat'        => $alamat,
            'rt'            => $rt,
            'rw'            => $rw,
            'keldes'        => $keldes,
            'kecamatan'     => $kecamatan,
            'agama'         => $agama,
            'status_kawin'  => $statusKawin,
        );

        $validasi = $this->validate($request, [
            'nm_lengkap'    => 'required|min:3|max:30',
            'nik'           => 'required|min:10|max:30',
            'tgl_lahir'     => 'required',
            'tmp_lahir'     => 'required|min:3|max:20',
            'jenis_kelamin' => 'required',
            'goldar'        => 'required',
            'no_hp'         => 'required|numeric',
            'alamat'        => 'required',
            'rt'            => 'required|max:5',
            'rw'            => 'required|max:5',
            'keldes'        => 'required|min:3',
            'kecamatan'     => 'required|min:3',
            'agama'         => 'required',
            'status_kawin'  => 'required',
        ]);

        if ($validasi) {
            // cek apakah id ada
            $checkId = DB::table('user')->where('id', $userId)->count();
            if ($checkId > 0) {
                // cek perubahan
                $checkChanges = DB::table('user')
                    ->where('nm_lengkap', $nmLengkap)
                    ->where('nik', $nik)
                    ->where('tgl_lahir', $tglLahir)
                    ->where('tmp_lahir', $tmpLahir)
                    ->where('jenis_kelamin', $jenisKelamin)
                    ->where('goldar', $goldar)
                    ->where('no_hp', $nohp)
                    ->where('alamat', $alamat)
                    ->where('rt', $rt)
                    ->where('rw', $rw)
                    ->where('keldes', $keldes)
                    ->where('kecamatan', $kecamatan)
                    ->where('agama', $agama)
                    ->where('status_kawin', $statusKawin)
                    ->count();
                if ($checkChanges > 0) {
                    return redirect()->back()->with('failed', 'Data pasien tidak ada perubahan!');
                } else {
                    // cek id dan nik apakah ada
                    $checkIdNik = DB::table('user')->where('id', $userId)->where('nik', $nik)->count();
                    if ($checkIdNik > 0) {
                        $queryUpdate = DB::table('user')->where('id', $userId)->update($dataUser);
                        return redirect()->back()->with('success', 'Data pasien berhasil diubah!');
                    } else {
                        // cek nik apakah tersedia
                        $checkNik = DB::table('user')->where('nik', $nik)->count();
                        if ($checkNik > 0) {
                            return redirect()->back()->with('failed', 'NIK sudah terdaftar!');
                        } else {
                            DB::table('user')->where('id', $userId)->update($dataUser);
                            return redirect()->back()->with('success', 'Data pasien berhasil diubah!');
                        }
                    }
                }
            } else {
                return redirect()->back()->with('failed', 'Id pasien tidak ditemukan!');
            }
        }
    }

    public function act_delete(Request $request)
    {
        $userId = $request->user_id;

        if ($userId == null) {
            return redirect()->back()->with('failed', 'Data pasien tidak ditemukan!');
        } else {
            // cek apakah id teradaftar atau tidak
            $checkId = DB::table('user')->where('id', $userId)->count();
            if ($checkId > 0) {
                // cek ke tabel autentikasi
                $checkAuth = DB::table('autentikasi')->where('user_id', $userId)->count();
                if ($checkAuth > 0) {
                    DB::table('user')->where('id', $userId)->delete();
                    DB::table('autentikasi')->where('user_id', $userId)->delete();
                    DB::table('wawancara')->where('user_id', $userId)->delete();
                    DB::table('pemeriksaan')->where('user_id', $userId)->delete();
                    DB::table('riwayat')->where('user_id', $userId)->delete();
                    return redirect()->back()->with('success', 'Data pasien berhasil dihapus!');
                } else {
                    return redirect()->back()->with('failed', 'Data autentikasi pasien tidak ditemukan!');
                }
            } else {
                return redirect()->back()->with('failed', 'Data pasien tidak ditemukan!');
            }
        }
    }
}
