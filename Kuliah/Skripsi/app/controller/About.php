<?php

class About extends Controller
{
    public function index($umur = 31, $kerja = 'Mahasiswa')
    {
        //$data['nama'] = $this->model('User_model')->getUser();
        //$data['umur'] = $umur;
        //$data['kerja'] = $kerja;
        $data['judul'] = 'Tentang saya';

        $this->view('_templates/header', $data);
        $this->view('about/index');
        $this->view('_templates/footer');
    }
    public function help()
    {

        $data['judul'] = 'Bantuan pengguna';
        $this->view('_templates/header', $data);
        $this->view('about/help');
        $this->view('_templates/footer');
    }
}
