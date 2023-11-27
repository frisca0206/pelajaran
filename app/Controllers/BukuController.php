<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class BukuController extends BaseController
{
    protected $BukuModel;

    public function __construct()
    {
        $this->BukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Subjects Management',
            'page_title' => 'Subjects List',
            'bukus' => $this->BukuModel->findAll() 
        ];
        return view('buku/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Subjects Management',
            'page_title' => 'Create Subjects List',
        ];

        return view('buku/create', $data);
    }

    public function store()
    {
        $nama_pelajaran = $this->request->getPost('nama_pelajaran');

        $new_buku = [
            'nama_pelajaran' => $nama_pelajaran
        ];

        $insert_buku = $this->BukuModel->insert($new_buku);
        return redirect()->to('buku');
    }

    public function edit($buku_id)
    {
        $data = [
            'title' => 'Subjects Management',
            'page_title' => 'Edit Subjects',
            'buku' => $this->BukuModel->find($buku_id)
        ];
        return view('buku/edit', $data);
    }

    public function update()
    {
        $buku_id = $this->request->getPost('buku_id');
        $nama_pelajaran = $this->request->getPost('nama_pelajaran');

        $edit_buku = [
            'nama_pelajaran' => $nama_pelajaran
        ];

        $update_buku = $this->BukuModel->update($buku_id, $edit_buku);
        return redirect()->to('buku');
    }

    public function delete($buku_id)
    {
        $this->BukuModel->delete($buku_id);
        return redirect()->to('buku');
    }
}