<?php
class Page404 extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // load views
        //$data['aktif'] = 'Error';
        $data['judul'] = 'Halaman Error';
        $this->view('_templates/header', $data);
        $this->view('problem/index');
        $this->view('_templates/footer');
    }
}
