<?php

namespace App\Http\Controllers\be\pendaftaran;

use App\Http\Controllers\be\ConTambahan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConPendaftaran extends Controller
{
    public function index()
    {
        return view('be.pages.pendaftaran.index');
    }

    public function act_add(Request $request)
    {
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

        $email    = $request->email;
        $password = md5($request->password);
        $role     = 'pasien';

        // insert ke user baru ke autentikasi
        // $x = $alamat . '+----+' . $rt . '+----+' . $rw . '+----+' . $keldes . '+----+' . $kecamatan . '+----+' . $agama . '+----+' . $statusKawin;
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

        $dataAuth = array(
            'email'    => $email,
            'password' => $password,
            'role'     => $role
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
            'email'         => 'required|email',
            'password'      => 'required|min:4',
        ]);

        if ($validasi) {
            // cek apakah nik dan email telah ada
            $checkNik   = DB::table('user')->where('nik', $nik)->count();
            $checkemail = DB::table('autentikasi')->where('email', $email)->count();
            if ($checkNik > 0) {
                return redirect()->back()->with('failed', 'NIK telah terdaftar')->withInput();
            } else if ($checkemail > 0) {
                return redirect()->back()->with('failed', 'Email telah terdaftar')->withInput();
            } else {
                $queryAdd = DB::table('user')->insertGetId($dataUser);

                $dataMergeAuth = array_merge($dataAuth, array('user_id' => $queryAdd));
                $queryAddAuth = DB::table('autentikasi')->where('user_id', $queryAdd)->insert($dataMergeAuth);
                // if (!$queryAddAuth) {
                //     $lastRow = DB::table('user')->where('id', $queryAdd)->first();
                //     $lastRow->delete();
                // }
                return redirect()->route('be.pasien.list')->with('success', 'Data Pasien berhasil ditambahkan!');
            }
        }
    }
}
