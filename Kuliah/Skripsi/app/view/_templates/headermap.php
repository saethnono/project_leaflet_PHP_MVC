<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>assets/css/index.css" rel="stylesheet">
    <link href="<?php echo URL; ?>assets/css/custom.leaflet.popup.css" rel="stylesheet">
    <link href="<?php echo URL; ?>assets/css/mydivIcon.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->   
    <link rel="stylesheet" href="<?php echo URL; ?>assets/css/all.css">
    <!-- link the css files -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/leafassets/leaflet/leaflet.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/leafassets/sidebar/css/leaflet-sidebar.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/leafassets/leaflet/customLayerControl.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/leafassets/cari/src/leaflet-search.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/leafassets/leaflet/leaflet.awesome-markers.css">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top">
        <img class="navbar-brand logo" src="<?php echo URL; ?>assets/img/Logo.png" width="30px" height="auto" /> <a class="navbar-brand text-light"> SUMBA BARAT DAYA</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link fas fa-home" href="<?php echo URL; ?>"> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fas fa-map-marker" href="<?php echo URL; ?>destinasi"> Destinasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link far fa-globe-asia" href="<?php echo URL; ?>mapa"> Peta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fas fa-user" href="<?php echo URL; ?>profile"> Profile</a>
                </li>
            </ul>
            
        </div>
    </nav>