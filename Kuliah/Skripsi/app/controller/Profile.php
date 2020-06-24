<?php
class Profile extends Controller
{
    public function index()
    {
        $data['judul'] = 'My profile';
        $this->view('_templates/header', $data);
        $this->view('profile/index');
        $this->view('_templates/footer');
    }
}
