<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kategori_id',
        'judul',
        'penulis',
        'penerbit',
        'tahun',
        'deskripsi',
        'cover',
        'file_pdf'
    ];

    protected $returnType = 'array';
}