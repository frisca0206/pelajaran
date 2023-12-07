<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\MapelModel;
use App\Models\GuruModel;


class JadwalController extends BaseController
{
    protected $JadwalModel;

    public function __construct()
    {
        $this->JadwalModel = new JadwalModel();
        $this->MapelModel = new MapelModel();
        $this->GuruModel = new GuruModel();
    }

    public function index()
    {
        $jadwals = $this->JadwalModel->select('jadwal.*,mapel.nama_pelajaran,guru.guru')
        ->join('mapel','mapel.id = jadwal.nama_pelajaran_id')
        ->join('guru','guru.id = jadwal.guru_id')->findAll();

        $data = [
            'title' => 'Lesson Timetable Management',
            'page_title' => 'List Lesson Timetable',
            'jadwals' => $jadwals
        ];
        return view('jadwal/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Lesson Timetable Management',
            'page_title' => 'Create List Lesson Timetable',
            'mapels' => $this->MapelModel->findAll(),
            'gurus' =>$this->GuruModel->findAll(),
        ];

        return view('jadwal/create', $data);
    }

    public function store()
    {
        $nama_pelajaran = $this->request->getPost('nama_pelajaran');
        $deskripsi = $this->request->getPost('deskripsi');
        $total_jam = $this->request->getPost('total_jam');
        $guru = $this->request->getPost('guru');

        $new_jadwal = [
            'nama_pelajaran_id' => $nama_pelajaran,
            'deskripsi' => $deskripsi,
            'total_jam' => $total_jam,
            'guru_id' => $guru,
        ];

        $insert_jadwal = $this->JadwalModel->insert($new_jadwal);
        return redirect()->to('jadwal');
    }

    public function edit($jadwal_id)
    {
        $data = [
            'title' => 'Lesson Timetable Management',
            'page_title' => 'Edit Lesson Timetable',
            'jadwal' => $this->JadwalModel->find($jadwal_id),
            'mapels' => $this->MapelModel->findAll(),
            'gurus' => $this->GuruModel->findAll(),
        ];
        return view('jadwal/edit', $data);
    }

    public function update()
    {
        $jadwal_id = $this->request->getPost('jadwal_id');
        $nama_pelajaran = $this->request->getPost('nama_pelajaran');
        $deskripsi = $this->request->getPost('deskripsi');
        $total_jam = $this->request->getPost('total_jam');
        $guru = $this->request->getPost('guru');

        $edit_jadwal = [
            'nama_pelajaran_id' => $nama_pelajaran,
            'deskripsi' => $deskripsi,
            'total_jam' => $total_jam,
            'guru_id' => $guru,
        ];

        $update_jadwal = $this->JadwalModel->update($jadwal_id, $edit_jadwal);
        return redirect()->to('jadwal');
    }

    public function delete($jadwal_id)
    {
        $this->JadwalModel->delete($jadwal_id);
        return redirect()->to('jadwal');
    }
}