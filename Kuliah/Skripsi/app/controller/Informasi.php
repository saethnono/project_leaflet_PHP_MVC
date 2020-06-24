<?php

class Informasi extends Controller
{
    public function index()
    {
        $data['aktif'] = 'informasi';
        $data['judul'] = 'Informasi Potensi Daerah';
        $data['potensi'] = $this->model('info')->getPotensiDaerah();
        $this->view('_templates/header', $data);
        $this->view('informasi/index', $data);
        $this->view('_templates/footer');
    }
    public function potensidaerah($id)
    {
        $data['aktif'] = 'informasi';
        $data['judul'] = 'Informasi Potensi Daerah';
        $data['potinfo'] = $this->model('info')->getPotensiDaerahById($id);
        $this->view('_templates/header', $data);
        $this->view('informasi/detailpotensi', $data);
        $this->view('_templates/footer');
    }
    public function industri()
    {
        $data['aktif'] = 'industri';
        $data['judul'] = 'Potensi Industri';
        $data['industri'] = $this->model('info')->getIndustriByRemark();
        $this->view('_templates/header', $data);
        $this->view('informasi/industri', $data);
        $this->view('_templates/footer');
    }

    public function perikanan()
    {
        $data['aktif'] = 'perikanan';
        $data['judul'] = 'Potensi Perikanan';
        $data['ikan'] = $this->model('info')->getPerikananByRemark();
        $this->view('_templates/header', $data);
        $this->view('informasi/perikanan', $data);
        $this->view('_templates/footer');
    }
    public function perkebunan()
    {
        $data['aktif'] = 'perkebunan';
        $data['judul'] = 'Potensi Perkebunan';
        $data['kebun'] = $this->model('info')->getPerkebunanByRemark();
        $this->view('_templates/header', $data);
        $this->view('informasi/perkebunan', $data);
        $this->view('_templates/footer');
    }
    public function pertambangan()
    {
        $data['aktif'] = 'pertambangan';
        $data['judul'] = 'Potensi Pertambangan';
        $data['tambang'] = $this->model('info')->getPertambanganByRemark();
        $this->view('_templates/header', $data);
        $this->view('informasi/pertambangan', $data);
        $this->view('_templates/footer');
    }

    // public function cari()
    // {
    //     $data['judul'] = 'Cari data';
    //     $data['wisata'] = $this->model('Peta')->cariDataWisata();
    //     $this->view('_templates/header', $data);
    //     $this->view('destinasi/index', $data);
    //     $this->view('_templates/footer');
    // }
}
