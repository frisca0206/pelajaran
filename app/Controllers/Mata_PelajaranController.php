<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mata_PelajaranModel;


class Mata_PelajaranController extends BaseController
{
    protected $Mata_PelajaranModel;

    public function __construct()
    {
        $this->Mata_PelajaranModel = new Mata_PelajaranModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lesson Timetable Management',
            'page_title' => 'List Lesson Timetable',
            'mata_pelajarans' => $this->Mata_PelajaranModel->findAll()
        ];
        return view('mata_pelajaran/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Lesson Timetable Management',
            'page_title' => 'Create List Lesson Timetable',
        ];

        return view('mata_pelajaran/create', $data);
    }

    public function store()
    {
        $nama_pelajaran = $this->request->getPost('nama_pelajaran');
        $deskripsi = $this->request->getPost('deskripsi');
        $total_jam = $this->request->getPost('total_jam');
        $guru = $this->request->getPost('guru');

        $new_mata_pelajaran = [
            'nama_pelajaran' => $nama_pelajaran,
            'deskripsi' => $deskripsi,
            'total_jam' => $total_jam,
            'guru' => $guru,
        ];

        $insert_mata_pelajaran = $this->Mata_PelajaranModel->insert($new_mata_pelajaran);
        return redirect()->to('mata_pelajaran');
    }

    public function edit($mata_pelajaran_id)
    {
        $data = [
            'title' => 'Lesson Timetable Management',
            'page_title' => 'Edit Lesson Timetable',
            'mata_pelajaran' => $this->Mata_PelajaranModel->find($mata_pelajaran_id)
        ];
        return view('mata_pelajaran/edit', $data);
    }

    public function update()
    {
        $mata_pelajaran_id = $this->request->getPost('mata_pelajaran_id');
        $nama_pelajaran = $this->request->getPost('nama_pelajaran');
        $deskripsi = $this->request->getPost('deskripsi');
        $total_jam = $this->request->getPost('total_jam');
        $guru = $this->request->getPost('guru');

        $edit_mata_pelajaran = [
            'nama_pelajaran' => $nama_pelajaran,
            'deskripsi' => $deskripsi,
            'total_jam' => $total_jam,
            'guru' => $guru,
        ];

        $update_mata_pelajaran = $this->Mata_PelajaranModel->update($mata_pelajaran_id, $edit_mata_pelajaran);
        return redirect()->to('mata_pelajaran');
    }

    public function delete($mata_pelajaran_id)
    {
        $this->Mata_PelajaranModel->delete($mata_pelajaran_id);
        return redirect()->to('mata_pelajaran');
    }
}