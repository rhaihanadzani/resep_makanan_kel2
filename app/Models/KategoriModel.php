<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori_resep';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kategori'];
}
