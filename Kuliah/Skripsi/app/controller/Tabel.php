<?php

class Tabel extends Controller
{
    public function index()
    {
        $data['aktif'] = 'tabel';
        $data['judul'] = 'Tabel Potensi Daerah';
        $data['tabel'] = $this->model('Tabel')->getKecamatan();
        $this->view('_templates/header', $data);
        $this->view('tabel/index', $data);
        $this->view('_templates/footer');
    }
    public function infotabel($id)
    {
        $id = $_GET['id'];
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $IDkec           = intval($_GET['id']);
            $data['kecid'] = $this->model('Tabel')->getTablesByIdKecamatan($IDkec);
            $this->view('tabel/infotabel', $data);
        }

        //$this->view('tabel/index');
    }
}
