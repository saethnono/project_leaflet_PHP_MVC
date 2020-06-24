<?php
class Page extends Controller
{
    public function index()
    {
        $data['aktif'] = 'laman';
        $data['judul'] = 'Hitung Halaman';
        $data['hal'] = $this->model('page')->total_views();
        $this->view('_templates/header', $data);
        $this->view('halaman/index', $data);
        $this->view('_templates/footer');
    }
}