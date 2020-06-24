<?php

class App
{
    /* Untuk mengontrol url dan aksi pada address bar dan pada file yang ada di folder kontroler
    yang nama kontrolernya dan actionnya sama pada url */
    protected $kontroler = null; // sebagai kontroler default
    protected $metode = null; // sebagai method atau aksi default
    private $params = []; //sebagai parameter 

    public function __construct()
    {

        $this->parseUrl();
        //var_dump($_GET);
        //echo 'saya di App class';
        if (!$this->kontroler) {

            require APP . 'controller/home.php';
            $page = new Home;
            $page->index();
        } elseif (file_exists(APP . 'controller/' . $this->kontroler . '.php')) {
            require APP . 'controller/' . $this->kontroler . '.php';
            $this->kontroler = new $this->kontroler();
            if (method_exists($this->kontroler, $this->metode)) {

                if (!empty($this->params)) {
                    call_user_func_array(array($this->kontroler, $this->metode), $this->params);
                } else {
                    $this->kontroler->{$this->metode}();
                }
            } else {
                if (strlen($this->metode) == 0) {
                    $this->kontroler->index();
                } else {
                    header('location: ' . URL . 'page404');
                }
            }
        } else {
            header('location: ' . URL . 'page404');
        }
    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {

            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $this->kontroler = isset($url[0]) ? $url[0] : $this->kontroler;
            $this->metode = isset($url[1]) ? $url[1] : $this->metode;
            unset($url[0], $url[1]);
            $this->params = array_values($url);
        }
    }
}
