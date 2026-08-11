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

    // Tampilkan data
    public function index()
    {
        $data = [
            'title'    => 'Data Kategori',
            'kategori' => $this->kategori->orderBy('id', 'DESC')->paginate(5, 'admin_kategori'),
            'pager'    => $this->kategori->pager,
            'currentPage' => $this->kategori->pager->getCurrentPage('admin_kategori'),
        ];

        return view('admin/kategori/index', $data);
    }

    // Form tambah
    public function create()
    {
        return view('admin/kategori/create', [
            'title' => 'Tambah Kategori'
        ]);
    }

    // Simpan
    public function store()
    {
        $rules = [
            'nama_kategori' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->kategori->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to('/admin/kategori')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Kategori',
            'kategori' => $this->kategori->find($id)
        ];

        return view('admin/kategori/edit', $data);
    }

    // Update
    public function update($id)
    {
        $this->kategori->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to('/admin/kategori')
            ->with('success', 'Kategori berhasil diubah.');
    }

    // Hapus
    public function delete($id)
    {
        $this->kategori->delete($id);

        return redirect()->to('/admin/kategori')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
