<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;


class GuruController extends BaseController
{
    protected $GuruModel;

    public function __construct()
    {
        $this->GuruModel = new GuruModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Teachers Management',
            'page_title' => 'Teachers List',
            'gurus' =>$this->GuruModel->findAll()
        ];
        return view('guru/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Teachers Management',
            'page_title' => 'Create Teachers',
        ];

        return view('guru/create', $data);
    }

    public function store()
    {
        $guru = $this->request->getPost('guru');

        $new_guru = [
            'guru' => $guru,
        ];

        $insert_guru = $this->GuruModel->insert($new_guru);
        return redirect()->to('guru');
    }

    public function edit($guru_id) 
    {
        $data = [
            'title' => 'Teachers Management',
            'page_title' => 'Edit Teachers',
            'gurus' => $this->GuruModel->find($guru_id)
        ];
        return view('guru/edit', $data);
    }

    public function update()
    {
        $guru_id = $this->request->getPost('guru_id');
        $guru = $this->request->getPost('guru');

        $edit_guru = [
            'guru' => $guru,
        ];

        $update_guru = $this->GuruModel->update($guru_id, $edit_guru);
        return redirect()->to('guru');
    }

    public function delete($guru_id)
    {
        $this->GuruModel->delete($guru_id);
        return redirect()->to('guru');
    }
}