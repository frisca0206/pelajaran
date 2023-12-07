<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MapelModel;

class MapelController extends BaseController
{
    protected $MapelModel;

    public function __construct()
    {
        $this->MapelModel = new MapelModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Subjects Management',
            'page_title' => 'Subjects List',
            'mapels' => $this->MapelModel->findAll() 
        ];
        return view('mapel/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Subjects Management',
            'page_title' => 'Create Subjects List',
        ];

        return view('mapel/create', $data);
    }

    public function store()
    {
        $nama_pelajaran = $this->request->getPost('nama_pelajaran');

        $new_mapel = [
            'nama_pelajaran' => $nama_pelajaran
        ];

        $insert_mapel = $this->MapelModel->insert($new_mapel);
        return redirect()->to('mapel');
    }

    public function edit($mapel_id)
    {
        $data = [
            'title' => 'Subjects Management',
            'page_title' => 'Edit Subjects',
            'mapel' => $this->MapelModel->find($mapel_id)
        ];
        return view('mapel/edit', $data);
    }

    public function update()
    {
        $mapel_id = $this->request->getPost('mapel_id');
        $nama_pelajaran = $this->request->getPost('nama_pelajaran');

        $edit_mapel = [
            'nama_pelajaran' => $nama_pelajaran
        ];

        $update_mapel = $this->MapelModel->update($mapel_id, $edit_mapel);
        return redirect()->to('mapel');
    }

    public function delete($mapel_id)
    {
        $this->MapelModel->delete($mapel_id);
        return redirect()->to('mapel');
    }
}