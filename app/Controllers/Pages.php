<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'WebSP | Home',
            'tes' => ['satu', 'dua', 'tiga']
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'WebSP | About'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => ' WebSP | Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jalan Melati Desa Serang Kec Petarukan',
                    'kota' => 'Pemalang'
                ],
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jalan Nusa Indah Desa Pelutan Kec Pelutan',
                    'kota' => 'Pemalang'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }
}
