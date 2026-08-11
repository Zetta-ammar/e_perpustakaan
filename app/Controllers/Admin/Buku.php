<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BukuModel;
use App\Models\KategoriModel;

class Buku extends BaseController
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
        $data = [
            'title' => 'Data Buku',
            'buku' => $this->buku
                ->select('buku.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id = buku.kategori_id')
                ->orderBy('buku.id', 'DESC')
                ->paginate(5, 'admin_buku'),
            'pager' => $this->buku->pager,
            'currentPage' => $this->buku->pager->getCurrentPage('admin_buku'),
        ];

        return view('admin/buku/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Buku',
            'kategori' => $this->kategori->orderBy('nama_kategori')->findAll()
        ];

        return view('admin/buku/create', $data);
    }


    public function store()
{
    $rules = [
        'kategori_id' => 'required',
        'judul'       => 'required',
        'penulis'     => 'required',
        'penerbit'    => 'required',
        'tahun'       => 'required|numeric',
        'cover'       => 'uploaded[cover]|is_image[cover]|max_size[cover,2048]',
        'file_pdf'    => 'uploaded[file_pdf]|ext_in[file_pdf,pdf]|max_size[file_pdf,10240]',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Upload Cover
    $cover = $this->request->getFile('cover');
    $namaCover = $cover->getRandomName();
    $cover->move(FCPATH . 'uploads/cover', $namaCover);

    // Upload PDF
    $pdf = $this->request->getFile('file_pdf');
    $namaPdf = $pdf->getRandomName();
    $pdf->move(FCPATH . 'uploads/pdf', $namaPdf);

    // Simpan ke Database
    $this->buku->insert([
        'kategori_id' => $this->request->getPost('kategori_id'),
        'judul'       => $this->request->getPost('judul'),
        'penulis'     => $this->request->getPost('penulis'),
        'penerbit'    => $this->request->getPost('penerbit'),
        'tahun'       => $this->request->getPost('tahun'),
        'deskripsi'   => $this->request->getPost('deskripsi'),
        'cover'       => $namaCover,
        'file_pdf'    => $namaPdf,
    ]);

    return redirect()->to('/admin/buku')
        ->with('success', 'Buku berhasil ditambahkan.');
}

public function edit($id)
{
    $data = [
        'title'    => 'Edit Buku',
        'buku'     => $this->buku->find($id),
        'kategori' => $this->kategori->findAll()
    ];

    if (!$data['buku']) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return view('admin/buku/edit', $data);
}

public function update($id)
{
    $buku = $this->buku->find($id);

    if (!$buku) {
        return redirect()->to('/admin/buku')
            ->with('error', 'Data buku tidak ditemukan.');
    }

    // ==========================
    // UPDATE COVER
    // ==========================
    $cover = $this->request->getFile('cover');

    if ($cover && $cover->isValid() && !$cover->hasMoved()) {

        // Hapus cover lama
        if (!empty($buku['cover']) && file_exists(FCPATH . 'uploads/cover/' . $buku['cover'])) {
            unlink(FCPATH . 'uploads/cover/' . $buku['cover']);
        }

        $namaCover = $cover->getRandomName();
        $cover->move(FCPATH . 'uploads/cover', $namaCover);

    } else {

        $namaCover = $buku['cover'];

    }

    // ==========================
    // UPDATE PDF
    // ==========================
    $pdf = $this->request->getFile('file_pdf');

    if ($pdf && $pdf->isValid() && !$pdf->hasMoved()) {

        if (!empty($buku['file_pdf']) && file_exists(FCPATH . 'uploads/pdf/' . $buku['file_pdf'])) {
            unlink(FCPATH . 'uploads/pdf/' . $buku['file_pdf']);
        }

        $namaPdf = $pdf->getRandomName();
        $pdf->move(FCPATH . 'uploads/pdf', $namaPdf);

    } else {

        $namaPdf = $buku['file_pdf'];

    }

    // ==========================
    // UPDATE DATABASE
    // ==========================

    $this->buku->update($id, [

        'kategori_id' => $this->request->getPost('kategori_id'),
        'judul'       => $this->request->getPost('judul'),
        'penulis'     => $this->request->getPost('penulis'),
        'penerbit'    => $this->request->getPost('penerbit'),
        'tahun'       => $this->request->getPost('tahun'),
        'deskripsi'   => $this->request->getPost('deskripsi'),
        'cover'       => $namaCover,
        'file_pdf'    => $namaPdf,

    ]);

    return redirect()->to('/admin/buku')
        ->with('success', 'Data buku berhasil diperbarui.');
}

public function delete($id)
{
    $buku = $this->buku->find($id);

    if (!$buku) {
        return redirect()->to('/admin/buku')
            ->with('error', 'Data buku tidak ditemukan.');
    }

    // Hapus cover
    if (!empty($buku['cover']) && file_exists(FCPATH . 'uploads/cover/' . $buku['cover'])) {
        unlink(FCPATH . 'uploads/cover/' . $buku['cover']);
    }

    // Hapus PDF
    if (!empty($buku['file_pdf']) && file_exists(FCPATH . 'uploads/pdf/' . $buku['file_pdf'])) {
        unlink(FCPATH . 'uploads/pdf/' . $buku['file_pdf']);
    }

    // Hapus data dari database
    $this->buku->delete($id);

    return redirect()->to('/admin/buku')
        ->with('success', 'Data buku berhasil dihapus.');
}
}
