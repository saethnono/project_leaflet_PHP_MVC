<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="My own blog design with Bootstrap">
    <meta name="author" content="Jose saet Nono">
    <title><?= $data['judul']?> </title>
    <!-- Bootstrap core CSS -->
<link href="<?php echo URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/leaflet.css"/>
<link href="<?php echo URL; ?>assets/css/Main.css" rel="stylesheet">
<link href="<?php echo URL; ?>assets/css/peta.css" rel="stylesheet">

    <!-- <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style> -->
  </head>
  <body>

  <nav class="navbar navbar-expand-md">
  <a class="navbar-brand" href="#">
    <img src="<?php echo URL; ?>assets/img/saethlogo2.png" alt="">Timor Geodetic Map
  </a>
  <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main-navigation">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>timormap">Map</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>