<?php

// app/Models/ResepModel

namespace App\Models;

use CodeIgniter\Model;

class ResepModel extends Model
{
    protected $table = 'resep';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'judul',
        'slug',
        'deskripsi',
        'bahan',
        'langkah',
        'waktu_masak',
        'tingkat_kesulitan',
        'gambar'
    ];

    public function simpanKategori($resepId, $kategoriIds)
    {
        $db = \Config\Database::connect();
        foreach ($kategoriIds as $kategoriId) {
            $db->table('resep_kategori')->insert([
                'resep_id' => $resepId,
                'kategori_id' => $kategoriId
            ]);
        }
    }

    // ini buat form EDIT
    public function getKategoriResep($resepId)
    {
        $result = $this->db->table('resep_kategori')
            ->select('kategori_id')
            ->where('resep_id', $resepId)
            ->get()
            ->getResultArray();

        return array_column($result, 'kategori_id');
    }

    // ini untuk rekomendasi

    public function getKategoriResepID($resepId)
    {
        return $this->db->table('resep_kategori')
            ->select('kategori_resep.id as kategori_id, kategori_resep.nama_kategori')
            ->join('kategori_resep', 'kategori_resep.id = resep_kategori.kategori_id')
            ->where('resep_kategori.resep_id', $resepId)
            ->get()->getResultArray();
    }

    public function getRekomendasiResep($kategoriIDs, $excludeResepId)
    {
        return $this->db->table('resep')
            ->select('resep.*')
            ->join('resep_kategori', 'resep_kategori.resep_id = resep.id')
            ->whereIn('resep_kategori.kategori_id', $kategoriIDs)
            ->where('resep.id !=', $excludeResepId)
            ->groupBy('resep.id')
            ->limit(6)
            ->get()->getResultArray();
    }
}
