<?php

namespace App\Controllers;

class Quran extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function daftarSurah()
    {
        $json = file_get_contents("https://equran.id/api/v2/surat");
        $result = json_decode($json, true);

        return view('daftar_surah', [
            'surah' => $result['data']
        ]);
    }

    public function detail($nomor)
    {
        $json = file_get_contents("https://equran.id/api/v2/surat/$nomor");
        $result = json_decode($json, true);

        return view('detail_surah', [
            'detail' => $result['data']
        ]);
    }
}