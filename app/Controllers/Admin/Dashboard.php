<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BukuModel;
use App\Models\KategoriModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $bukuModel = new BukuModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'title'          => 'Dashboard',
            'jumlahBuku'     => $bukuModel->countAll(),
            'jumlahKategori' => $kategoriModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }
}