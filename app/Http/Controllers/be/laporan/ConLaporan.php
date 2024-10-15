<?php

namespace App\Http\Controllers\be\laporan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\be\ConTambahan;
use Illuminate\Support\Facades\Date;

class ConLaporan extends Controller
{
    public function index()
    {
        $function = new ConTambahan();
        $arrMonth = $function->get_month();

        // Contoh mengambil data penyakit dari model (misalnya: Laporan)
        $nilaiTd         = 110; // >= 110 nilai tekanan darah jika terindikasi hipertensi
        $nilaiGdr        = 70;  // < 70 nilai gula darah rendah jika terindikasi gula darah rendah
        $nilaiGdt        = 126; // >= 126 nilai gula darah tingi jika terindikasi gula darah tinggi
        $nilaiKolesterol = 200;   // >= 200 nilai kolesterol jika terindikasi kolesterol
        $nilaiAsamUrat   = 6; // >= 6 nilai asam urat jika terindikasi asam urat

        foreach ($arrMonth as $month) {

            $jmlTd = DB::table('pemeriksaan')->select(
                DB::raw('COUNT(CASE WHEN ROUND((sistol + diastol) / 2, 0) >= 110 THEN 1 END) as jmlTekananTinggi'),
            )
                ->whereMonth('tgl_input', $month['key'])
                ->first();
            $jmlGdr   = DB::table('pemeriksaan')->where('gula_darah', '<', $nilaiGdr)->whereMonth('tgl_input', $month['key'])->count();
            $jmlGdt   = DB::table('pemeriksaan')->where('gula_darah', '>=', $nilaiGdt)->whereMonth('tgl_input', $month['key'])->count();
            $jmlKoles = DB::table('pemeriksaan')->where('kolesterol', '>=', $nilaiKolesterol)->whereMonth('tgl_input', $month['key'])->count();
            $jmlAsm   = DB::table('pemeriksaan')->where('asam_urat', '>=', $nilaiAsamUrat)->whereMonth('tgl_input', $month['key'])->count();

            $data[] = [
                'bulan'      => $month['value'],
                'hipertensi' => $jmlTd->jmlTekananTinggi,
                'gdr'        => $jmlGdr,
                'gdt'        => $jmlGdt,
                'kolesterol' => $jmlKoles,
                'asam_urat'  => $jmlAsm,
            ];
        }
        // dd($data);

        return view('be.pages.laporan.index', compact('arrMonth', 'data'));
    }

    public function index_kedua()
    {
        $function = new ConTambahan();
        $arrMonth = $function->get_month();

        // Contoh mengambil data penyakit dari model (misalnya: Laporan)
        $nilaiTd         = 110; // >= 110 nilai tekanan darah jika terindikasi hipertensi
        $nilaiGdr        = 70;  // < 70 nilai gula darah rendah jika terindikasi gula darah rendah
        $nilaiGdt        = 126; // >= 126 nilai gula darah tinggi jika terindikasi gula darah tinggi
        $nilaiKolesterol = 200;   // >= 200 nilai kolesterol jika terindikasi kolesterol
        $nilaiAsamUrat   = 6;    // >= 6 nilai asam urat jika terindikasi asam urat

        foreach ($arrMonth as $month) {
            // Subquery untuk mendapatkan data terbaru berdasarkan user_id
            $subQuery = DB::table('pemeriksaan as p1')
                ->select('p1.*')
                ->whereRaw('p1.tgl_input = (SELECT MAX(p2.tgl_input) FROM pemeriksaan p2 WHERE p2.user_id = p1.user_id)')
                ->whereMonth('p1.tgl_input', $month['key']);

            // Query utama berdasarkan subquery
            $jmlTd = DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
                ->mergeBindings($subQuery) // Gabungkan binding dari subquery
                ->select(DB::raw('COUNT(CASE WHEN ROUND((sistol + diastol) / 2, 0) >= 110 THEN 1 END) as jmlTekananTinggi'))
                ->first();

            $jmlGdr = DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
                ->mergeBindings($subQuery)
                ->where('gula_darah', '<', $nilaiGdr)
                ->count();

            $jmlGdt = DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
                ->mergeBindings($subQuery)
                ->where('gula_darah', '>=', $nilaiGdt)
                ->count();

            $jmlKoles = DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
                ->mergeBindings($subQuery)
                ->where('kolesterol', '>=', $nilaiKolesterol)
                ->count();

            $jmlAsm = DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
                ->mergeBindings($subQuery)
                ->where('asam_urat', '>=', $nilaiAsamUrat)
                ->count();

            $data[] = [
                'bulan'      => $month['value'],
                'hipertensi' => $jmlTd->jmlTekananTinggi,
                'gdr'        => $jmlGdr,
                'gdt'        => $jmlGdt,
                'kolesterol' => $jmlKoles,
                'asam_urat'  => $jmlAsm,
            ];
        }

        return view('be.pages.laporan.index', compact('arrMonth', 'data'));
    }
}
