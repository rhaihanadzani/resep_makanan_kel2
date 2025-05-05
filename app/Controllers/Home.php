<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\ResepModel;

class Home extends BaseController

{
    protected $resepModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->resepModel = new ResepModel();
        $this->kategoriModel = new KategoriModel();
    }
    public function index(): string
    {
        $resepModel = new \App\Models\ResepModel();


        $reseps = $resepModel->orderBy('created_at', 'DESC')
            ->limit(3)
            ->findAll();

        return view('home/index', [
            'reseps' => $reseps
        ]);
    }
}
