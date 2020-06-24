<?php
session_start();
//if(!session_name('flash')) session_start();
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);

require APP . 'init.php';
// start the application
$app = new App();
