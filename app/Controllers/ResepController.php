<?php

namespace App\Controllers;

use App\Models\ResepModel;
use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ResepController extends BaseController
{
    protected $resepModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->resepModel = new ResepModel();
        $this->kategoriModel = new KategoriModel();
    }

    // Tampilan form tambah resep
    public function create()
    {
        $data = [
            'kategories' => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('resep/add', $data);
    }

    // Proses simpan resep
    public function store()
    {
        // Validasi input
        $rules = [
            'judul' => 'required|min_length[3]',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
            'gambar' => 'uploaded[gambar]|is_image[gambar]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // buat upload gambar
        $file = $this->request->getFile('gambar');
        $namaGambar = $file->getRandomName();
        $file->move('uploads/resep', $namaGambar);

        // Generate slug
        $slug = url_title($this->request->getPost('judul'), '-', true);

        //    nyimpen ke database
        $this->resepModel->save([
            'judul' => $this->request->getPost('judul'),
            'slug' => $slug,
            'deskripsi' => $this->request->getPost('deskripsi'),
            'bahan' => json_encode(explode("\n", $this->request->getPost('bahan'))),
            'langkah' => json_encode(explode("\n", $this->request->getPost('langkah'))),
            'waktu_masak' => $this->request->getPost('waktu_masak'),
            'tingkat_kesulitan' => $this->request->getPost('tingkat_kesulitan'),
            'gambar' => $namaGambar
        ]);


        dd($this->request->getPost('kategories'));

        $resepId = $this->resepModel->insertID();
        if ($kategories = $this->request->getPost('kategories')) {
            $this->resepModel->simpanKategori($resepId, $kategories);
        }

        return redirect()->to('/')->with('success', 'Resep berhasil ditambahkan!');
    }

    // Tampilan edit resep
    public function edit($id)
    {
        $resep = $this->resepModel->find($id);



        $kategoriModel = new \App\Models\KategoriModel();
        $kategories = $kategoriModel->findAll();

        $kategoriDipilih = $this->resepModel->getKategoriResep($id); // array of kategori_id

        return view('resep/edit', [
            'resep' => $resep,
            'kategories' => $kategories,
            'kategoriDipilih' => $kategoriDipilih
        ]);
    }




    // Proses update resep
    public function update($id)
    {
        $rules = [
            'judul' => 'required|min_length[3]',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
            'gambar' => 'if_exist|uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $resep = $this->resepModel->find($id);
        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/resep', $namaGambar);
            if ($resep['gambar'] !== 'default.jpg' && file_exists('uploads/resep/' . $resep['gambar'])) {
                unlink('uploads/resep/' . $resep['gambar']);
            }
        } else {
            $namaGambar = $resep['gambar'];
        }

        $slug = url_title($this->request->getPost('judul'), '-', true);

        $this->resepModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'slug' => $slug,
            'deskripsi' => $this->request->getPost('deskripsi'),
            'bahan' => json_encode(explode("\n", $this->request->getPost('bahan'))),
            'langkah' => json_encode(explode("\n", $this->request->getPost('langkah'))),
            'waktu_masak' => $this->request->getPost('waktu_masak'),
            'tingkat_kesulitan' => $this->request->getPost('tingkat_kesulitan'),
            'gambar' => $namaGambar
        ]);

        $db = \Config\Database::connect();
        $db->table('resep_kategori')->where('resep_id', $id)->delete();

        if ($kategoriBaru = $this->request->getPost('kategories')) {
            $this->resepModel->simpanKategori($id, $kategoriBaru);
        }

        return redirect()->to('/')->with('success', 'Resep berhasil diperbarui!');
    }


    // Hapus resep
    public function delete($id)
    {
        $db = \Config\Database::connect();
        $db->transStart(); // Mulai transaction

        try {
            $resep = $this->resepModel->find($id);

            if (!$resep) {
                throw new \RuntimeException('Resep tidak ditemukan');
            }

            $db->table('resep_kategori')->where('resep_id', $id)->delete();

            if (!empty($resep['gambar']) && $resep['gambar'] !== 'default.jpg') {
                $gambarPath = 'uploads/resep/' . $resep['gambar'];
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }

            // 3. Hapus data resep
            $this->resepModel->delete($id);

            $db->transComplete();
            return redirect()->to('/')->with('success', 'Resep berhasil dihapus');
        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error deleting recipe: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus resep: ' . $e->getMessage());
        }
    }

    // Tampilan detail resep
    public function detail($id)
    {
        $resep = $this->resepModel->find($id);


        $kategoriResep = $this->resepModel
            ->getKategoriResepID($id);

        $kategoriIDs = array_column($kategoriResep, 'kategori_id');

        $rekomendasi = $this->resepModel->getRekomendasiResep($kategoriIDs, $id);

        return view('resep/detail', [
            'resep' => $resep,
            'kategoriResep' => $kategoriResep,
            'rekomendasi' => $rekomendasi
        ]);
    }
}
