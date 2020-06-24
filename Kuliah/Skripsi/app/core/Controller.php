<?php

class Controller
{
    private $__Nmodel = '_model';
    public function view($view, $data = [])
    {
        require APP . 'view/' . $view . '.php';
    }
    public function model($nama_model)
    {
        $namaModel = $nama_model . $this->__Nmodel;
        require APP . 'model/' . $namaModel . '.php';
        return new $namaModel;
    }
}
