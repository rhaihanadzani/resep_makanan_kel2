<?php

namespace App\Models;

use CodeIgniter\Model;

class ResepKategoriModel extends Model
{
    protected $table = 'resep_kategori';
    protected $allowedFields = ['resep_id', 'kategori_id'];
    public $timestamps = false;
}
