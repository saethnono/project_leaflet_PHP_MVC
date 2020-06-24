<?php

class Timormap extends Controller
{
    public function index()
    {
        // $data['aktif'] = 'peta';
        $data['judul'] = 'East-Timor Map';
        $this->view('_templates/header', $data);
        $this->view('peta/index');
        $this->view('_templates/footer');
    }

// public function kecamatanInfo()
    // {
        // $data['kec'] = $this->model('Admin_model')->getKecamatanInfo();
    // }

    public function potensidaerah()
    {
        $this->model('Peta')->getPotensiDaerahMap();
    }
    public function industri()
    {
        $this->model('Peta')->getIndustri();
    }
    public function perikanan()
    {
        $this->model('Peta')->getPerikanan();
    }
    public function perkebunan()
    {
        $this->model('Peta')->getPerkebunan();
    }
    public function pertambangan()
    {
        $this->model('Peta')->getPertambangan();
    }
    public function kecamatan()
    {
        $this->model('Peta')->getKecamatan();
    }
}
