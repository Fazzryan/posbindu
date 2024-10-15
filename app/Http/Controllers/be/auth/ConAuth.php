<?php

namespace App\Http\Controllers\be\auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ConAuth extends Controller
{
    public function index()
    {
        $cekSession = $this->cekSession();
        if ($cekSession == "true") {
            return redirect()->route('be.dashboard')->with('info', 'You are logged in!');
        } else {
            return view('be.pages.auth.login');
        }
    }
    public function register()
    {
        $cekSession = $this->cekSession();
        if ($cekSession == "true") {
            return redirect()->route('be.dashboard')->with('info', 'You are logged in!');
        } else {
            return view('be.pages.auth.register');
        }
    }
    public function actRegister(Request $request)
    {
        $namaLengkap = $request->nm_lengkap;
        $noHp        = $request->no_hp;
        $email       = $request->email;
        $password    = md5($request->password);
        $role        = 'pasien';

        $validasi = $this->validate($request, [
            'email'    => 'required|email|min:4',
            'password' => 'required|min:5|max:100'
        ]);

        $dataInsertUser = array(
            'nm_lengkap' => $namaLengkap,
            'no_hp'      => $noHp,
        );

        $dataInsertAuth = array(
            'email'      => $email,
            'password'   => $password,
            'role'       => $role
        );

        if ($validasi) {
            // cek apakah email sudah ada
            $chekcEmail = DB::table('autentikasi')->where('email', $email)->count();
            if ($chekcEmail > 0) {
                return redirect()->back()->with('failed', 'Email tidak tersedia!')->withInput();
            } else {
                // insert data user ke tabel autentikasi
                $getUserId = DB::table('user')->insertGetId($dataInsertUser);
                $dataMerge = array_merge($dataInsertAuth, array('user_id' => $getUserId));
                // Insert data ke tabel user dengan user_id yang baru didapat
                DB::table('autentikasi')->insert($dataMerge);
                return redirect()->route('auth.login')->with('success', 'Berhasil membuat akun!');
            }
        }
    }

    public function actLogin(Request $request)
    {
        $email    = $request->email;
        $password = $request->password;

        //custom notif validasi
        $messages = array(
            'required' => ':attribute Wajib Diisi!',
            'min'      => ':attribute Minimal 6 Karakter!',
            'max'      => ':attribute Maksimal 50 Karakter!'
        );
        $attribute = array(
            'email'    => 'Email',
            'password' => 'Password',
        );
        $credentials = array(
            'email'    => 'required',
            'password' => 'required',
        );

        $validasi = $this->validate($request, $credentials, $messages, $attribute);

        if ($validasi) {
            $pass = md5($password);
            // cek apakah username dan password ada

            $queryLogin = DB::table('autentikasi')
                ->where('email', $email)
                ->where('password', $pass);

            $cek = $queryLogin->count();

            // buat jaga jaga ketika semua user dihapus

            if ($cek > 0) {
                $user = $queryLogin->first();
                // jika ada maka buatkan session dan login
                $getUser = DB::table('user')
                    ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
                    ->select('user.nm_lengkap', 'user.gambar')
                    ->where('autentikasi.user_id', $user->user_id)
                    ->first();

                $user_session = [
                    'user_id'    => $user->user_id,
                    'nm_lengkap' => $getUser->nm_lengkap,
                    'role'       => $user->role,
                ];

                Session::put('user_session', $user_session);
                Session::put('login', TRUE);

                if ($user->role == 'admin') {
                    return redirect()->route('be.dashboard')->with('success', 'Login Berhasil!');
                } else if ($user->role == 'pasien') {
                    return redirect()->route('fe.identitas.show')->with('success', 'Login Berhasil!');
                } else {
                    Session::flush();
                    return redirect()->route('auth.login')->with('error', 'Role tidak ditemukan!');
                }
            } else {
                if (($email == "superadmin@gmail.com") && ($password == "dinda@admin123")) {
                    $user_session = [
                        'user_id'    => "0",
                        'nm_lengkap' => "Dinda Fazryan",
                        'role'       => "admin"
                    ];

                    Session::put('user_session', $user_session);
                    Session::put('login', TRUE);

                    return redirect()->route('be.dashboard')->with('success', 'Login Berhasil!');
                } else {
                    return redirect()->back()->with('failed', 'Email atau Password tidak sesuai!')->withInput();
                }
            }
        }
    }

    public function actLogout()
    {
        Session::flush();
        // Toastr::success('message', 'Berhasil Logout');
        return redirect()->route('auth.login');
        // ->with('success', 'Berhasil logout!')
    }

    public function cekSession()
    {
        if (Session::has('login')) {
            $getLogin = "true";
        } else {
            $getLogin = "false";
        }
        return $getLogin;
    }
}
