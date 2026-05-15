<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $client;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest([
            'timeout' => 20,
            'verify' => false
        ]);
    }

    public function index()
    {
        return view('home');
    }

    public function daftarSurah()
    {
        try {

            $response = $this->client->get('https://api.alquran.cloud/v1/surah');

            $result = json_decode($response->getBody(), true);

            return view('daftar_surah', [
                'surah' => $result['data']
            ]);

        } catch (\Exception $e) {

            return view('error_view', [
                'pesan' => 'Gagal mengambil data surah.'
            ]);
        }
    }

    public function detail($id)
    {
        try {

            $response = $this->client->get("https://api.alquran.cloud/v1/surah/$id/editions/quran-uthmani,id.indonesian,en.transliteration");

            $result = json_decode($response->getBody(), true);

            return view('detail_surah', [
                'detail' => $result['data']
            ]);

        } catch (\Exception $e) {

            return view('error_view', [
                'pesan' => 'Gagal mengambil detail surah.'
            ]);
        }
    }
}