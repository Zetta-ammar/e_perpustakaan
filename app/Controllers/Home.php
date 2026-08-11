<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
    protected $buku;
    protected $kategori;

    public function __construct()
    {
        $this->buku = new BukuModel();
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $kategori = $this->request->getGet('kategori');

        $builder = $this->buku
            ->select('buku.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id=buku.kategori_id');

        if (!empty($keyword)) {
            $builder->like('judul', $keyword);
        }

        if (!empty($kategori)) {
            $builder->where('kategori_id', $kategori);
        }

        $data = [
            'judul' => 'E-Perpustakaan',
            'buku' => $builder->orderBy('buku.id', 'DESC')->paginate(4, 'public'),
            'pager' => $this->buku->pager,
            'kategori' => $this->kategori->findAll(),
        ];

        return view('public/home', $data);
    }

    public function detail($id)
{
    $buku = $this->buku
        ->select('buku.*, kategori.nama_kategori')
        ->join('kategori', 'kategori.id = buku.kategori_id')
        ->where('buku.id', $id)
        ->first();

    if (!$buku) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $data = [
        'judul' => 'Detail Buku',
        'buku'  => $buku
    ];

    return view('public/detail', $data);
}
}
