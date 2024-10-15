<?php

namespace App\Http\Controllers\be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConTambahan extends Controller
{
    public function get_month()
    {
        $arrMonth = array(
            array(
                'key' => '01',
                'value' => 'Januari'
            ),
            array(
                'key' => '02',
                'value' => 'Februari'
            ),
            array(
                'key' => '03',
                'value' => 'Maret'
            ),
            array(
                'key' => '04',
                'value' => 'April'
            ),
            array(
                'key' => '05',
                'value' => 'Mei'
            ),
            array(
                'key' => '06',
                'value' => 'Juni'
            ),
            array(
                'key' => '07',
                'value' => 'Juli'
            ),
            array(
                'key' => '08',
                'value' => 'Agustus'
            ),
            array(
                'key' => '09',
                'value' => 'September'
            ),
            array(
                'key' => '10',
                'value' => 'Oktober'
            ),
            array(
                'key' => '11',
                'value' => 'November'
            ),
            array(
                'key' => '12',
                'value' => 'Desember'
            ),
        );

        return $arrMonth;
    }
}
