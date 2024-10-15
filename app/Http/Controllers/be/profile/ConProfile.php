<?php

namespace App\Http\Controllers\be\profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ConProfile extends Controller
{
    public function index()
    {
        $getProfile = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->where('autentikasi.role', 'admin')
            ->select(
                'user.*',
                'autentikasi.email as user_email',
                'autentikasi.password as user_password',
                'autentikasi.role as user_role',
            )
            ->get();

        return view('be.pages.profile.index', compact('getProfile'));
    }

    public function add()
    {
        return view('be.pages.profile.add');
    }

    public function detail($id)
    {
        // $userId = session()->get('user_session')['user_id'];
        $userId = base64_decode($id);
        $getProfileDetail = DB::table('user')
            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
            ->select(
                'user.id',
                'user.no_hp',
                'user.gambar',
                'user.nm_lengkap',
                'autentikasi.email',
                'user.jenis_kelamin',
            )
            ->where('user.id', $userId)
            ->first();
        return view('be.pages.profile.detail', compact('getProfileDetail'));
    }

    public function act_add(Request $request)
    {
        $namaLengkap  = ucwords(strtolower($request->nm_lengkap));
        $email        = $request->email;
        $noHp         = $request->no_hp;
        $role         = $request->role;
        $password     = md5($request->password);
        $jenisKelamin = $request->jenis_kelamin;
        $image       = $request->gambar;

        $validasi = $this->validate($request, [
            'nm_lengkap'    => 'required|min:3|max:100',
            'email'         => 'required|email|min:4|max:50',
            'no_hp'         => 'required',
            'jenis_kelamin' => 'required',
            'gambar'        => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $dataAddUser = array(
            'nm_lengkap'    => $namaLengkap,
            'no_hp'         => $noHp,
            'jenis_kelamin' => $jenisKelamin,
        );

        $dataAddAuth = array(
            'email' => $email,
            'role'  => $role,
            'password' => $password
        );

        if ($validasi) {
            // cek email
            $checkEmail = DB::table('autentikasi')->where('email', $email)->count();
            if ($checkEmail > 0) {
                return redirect()->back()->with('failed', 'Email tidak tersedia!');
            } else {
                // jika email masih kosong maka update data user dan autentikasi
                $image = $request->file('gambar');
                $oriExtention = $image->getClientOriginalExtension();
                //package update
                $imageName = "gambarprofile-" . rand() . "." . $oriExtention;
                $updateWithImg = array_merge($dataAddUser, array('gambar' => $imageName));

                $queryAddUser = DB::table('user')->insertGetId($updateWithImg);
                $dataMergeAuth = array_merge($dataAddAuth, array('user_id' => $queryAddUser));

                DB::table('autentikasi')->insert($dataMergeAuth);

                $image->move(public_path('/assets/be/images/profile/'), $imageName);

                return redirect()->route('be.profile.list')->with('success', 'Akun berhasil ditambahkan!');
            }
        }
    }

    public function act_edit(Request $request)
    {
        $userId       = $request->user_id;
        $namaLengkap  = ucwords(strtolower($request->nm_lengkap));
        $email        = $request->email;
        $noHp         = $request->no_hp;
        $jenisKelamin = $request->jenis_kelamin;
        $image       = $request->gambar;

        //custom notif validasi
        $validasi = $this->validate($request, [
            'user_id'       => 'required',
            'nm_lengkap'    => 'required',
            'email'         => 'required',
            'no_hp'         => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $dataUpdate = array(
            'nm_lengkap'    => $namaLengkap,
            'no_hp'         => $noHp,
            'jenis_kelamin' => $jenisKelamin,
        );

        if ($image == null) {
            if ($validasi) {
                // cek apakah ada ada
                $checkData = DB::table('user')->where('id', $userId)->count();
                if ($checkData > 0) {
                    // cek perubahan
                    $checkChanges = DB::table('user')
                        ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
                        ->where('user.id', $userId)
                        ->where('user.nm_lengkap', $namaLengkap)
                        ->where('autentikasi.email', $email)
                        ->where('user.no_hp', $noHp)
                        ->where('user.jenis_kelamin', $jenisKelamin)
                        ->count();
                    if ($checkChanges > 0) {
                        return redirect()->back()->with('failed', 'Tidak ada perubahan!');
                    } else {
                        // cek apakah data tersedia
                        $checkAvailable = DB::table('user')
                            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
                            ->where('user.id', $userId)
                            ->where('autentikasi.email', $email)
                            ->count();

                        if ($checkAvailable > 0) {
                            $queryUpdate = DB::table('user')->where('id', $userId)->update($dataUpdate);
                            return redirect()->back()->with('success', 'Profile berhasil diubah!');
                        } else {
                            // cek apakah email sudah ada
                            $checkEmail = DB::table('autentikasi')->where('email', $email)->count();
                            if ($checkEmail > 0) {
                                return redirect()->back()->with('failed', 'Email tidak tersedia!');
                            } else {
                                // jika email masih kosong maka update data user dan autentikasi
                                $queryUpdateUser = DB::table('user')->where('id', $userId)->update($dataUpdate);
                                $queryUpdateAuth = DB::table('autentikasi')->where('user_id', $userId)->update(array('email' => $email));

                                return redirect()->back()->with('success', 'Profile berhasil diubah!');
                            }
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Data tidak ditemukan!');
                }
            }
        } else {
            $newImage = $request->file('gambar');
            if ($validasi) {
                $oriExtention = $newImage->getClientOriginalExtension();
                $oriSize      = number_format($newImage->getSize() / 1024, 0); //KB
                $imageSize    = str_replace(',', '', $oriSize);

                if (($oriExtention == "jpg") || ($oriExtention == "JPG") || ($oriExtention == "png") || ($oriExtention == "PNG")) {
                    if ($imageSize > 2000) {
                        return redirect()->back()->with('failed', 'Ukuran gambar maksimal 2 Mb!')->withInput();
                    } else {
                        //package update
                        $imageName = "gambarprofile-" . rand() . "." . $oriExtention;
                        $updateWithImg = array_merge($dataUpdate, array('gambar' => $imageName));

                        // cek apakah data tersedia 
                        $checkAvailable = DB::table('user')
                            ->join('autentikasi', 'user.id', '=', 'autentikasi.user_id')
                            ->where('user.id', $userId)
                            ->where('autentikasi.email', $email)
                            ->count();
                        if ($checkAvailable > 0) {
                            //Unlink Logo
                            $getLogo = DB::table('user')->where('id', $userId)->first()->gambar;
                            if ($getLogo > 0) {
                                unlink(public_path('/assets/be/images/profile/' . $getLogo));
                            }

                            $queryUpdate = DB::table('user')->where('id', $userId)->update($updateWithImg);
                            $queryUpdateAuth = DB::table('autentikasi')->where('user_id', $userId)->update(array('email' => $email));
                            $newImage->move(public_path('/assets/be/images/profile/'), $imageName);

                            return redirect()->back()->with('success', 'Profile berhasil diubah!');
                        } else {
                            // cek email apakah tersedia
                            $checkEmail = DB::table('autentikasi')->where('email', $email)->count();
                            if ($checkEmail > 0) {
                                return redirect()->back()->with('failed', 'Email tidak tersedia!');
                            } else {
                                //Unlink Logo
                                $getLogo = DB::table('user')->where('id', $userId)->first()->gambar;
                                if ($getLogo > 0) {
                                    unlink(public_path('/assets/be/images/profile/' . $getLogo));
                                }

                                $queryUpdate = DB::table('user')->where('id', $userId)->update($updateWithImg);
                                $queryUpdateAuth = DB::table('autentikasi')->where('user_id', $userId)->update(array('email' => $email));
                                $newImage->move(public_path('/assets/be/images/profile/'), $imageName);

                                return redirect()->back()->with('success', 'Profile berhasil diubah!');
                            }
                        }
                    }
                } else {
                    return redirect()->back()->with('failed', 'Format gambar harus jpg atau png!');
                }
            }
        }
    }

    public function act_edit_autentikasi(Request $request)
    {
        $userId            = $request->user_id;
        $oldPassword       = md5($request->old_password);
        $newPassword       = md5($request->new_password);
        $repeatNewPassword = md5($request->repeat_new_password);

        $validasi = $this->validate($request, [
            'old_password'        => 'required|min:3',
            'new_password'        => 'required|min:3',
            'repeat_new_password' => 'required|min:3',
        ]);

        $dataUpdate = array(
            'password' => $newPassword
        );

        if ($validasi) {
            // cek apakah password sekarang sama dengan password lama
            $checkOldPw = DB::table('autentikasi')
                ->where('password', $oldPassword)
                ->where('user_id', $userId)
                ->count();
            if ($checkOldPw > 0) {
                // cek apakah ulangi password apoakah sama
                if ($newPassword == $repeatNewPassword) {
                    $queryUpdate = DB::table('autentikasi')->where('user_id', $userId)->update($dataUpdate);
                    return redirect()->back()->with('success', 'Kata sandi berhasil diubah!');
                } else {
                    return redirect()->back()->with('failed', 'Ulang Kata sandi tidak sesuai!');
                }
            } else {
                return redirect()->back()->with('failed', 'Kata sandi lama tidak sesuai!');
            }
        }
    }


    public function delete(Request $request)
    {
        $userId = $request->user_id;
        if ($userId == null) {
            return redirect()->back()->with('failed', 'Data tidak ditemukan!');
        } else {
            // cek apakah id teradaftar atau tidak
            $checkId = DB::table('autentikasi')->where('user_id', $userId)->count();
            if ($checkId > 0) {
                $getImg = DB::table('user')->where('id', $userId)->first()->gambar;
                if ($getImg > 0) {
                    // Unlink gambar, jika ada maka hapus gambar nya
                    unlink(public_path('/assets/be/images/profile/' . $getImg));
                }
                DB::table('autentikasi')->where('user_id', $userId)->delete();
                DB::table('user')->where('id', $userId)->delete();

                return redirect()->back()->with('success', 'Data berhasil dihapus!');
            } else {
                return redirect()->back()->with('failed', 'Data tidak ditemukan!');
            }
        }
    }
}
