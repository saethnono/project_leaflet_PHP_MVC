<?php

class Home extends Controller
{

    public function index()
    {
        //$data['aktif'] = 'home';
        $data['judul'] = 'Welcome - Home';
        //$data['kec']   = $this->model('Home')->getKecamatanInfo();
        //$data['kecinfo'] = $this->model('Admin_model')->getKecamatanInfoById();
        $this->view('_templates/header', $data);
        //$this->view('_templates/menu', $data);
        $this->view('home/index');
        $this->view('_templates/midfooter');
        $this->view('_templates/footer');
    }
    
}
