<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategori;

    public function __construct()
    {
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $data['kategori'] = $this->kategori->findAll();

        return view('admin/kategori/index', $data);
    }
}