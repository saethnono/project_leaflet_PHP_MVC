<!DOCTYPE html>
<html>

<head>
<title><?=$data['judul']; ?></title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <!-- <link rel="stylesheet" href="<?php //echo URL; ?>assetstemp/css/fontcss.css"/> -->
    <link rel="stylesheet" href="<?php echo URL; ?>assetstemp/js/leaflet/leaflet.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>assetstemp/js/cari/src/leaflet-search.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>boot/css/bootstrap.css" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->

</head>

<body>
    <div id="wrapper">
        <!-- <div id="panel"><span class="p2">Demo Leaflet by Saethnono</span>  -->
        <div id="panel">
                <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                <li style="float:left" class="p2">Potensi Daerah Kabupaten Musi-Banyuasin</li>
                <li class="<?php if ($data['aktif'] == 'about') {echo 'selected';} ?>"><a href="#">About</a></li>
                <li class="<?php if ($data['aktif'] == 'tabel') {echo 'selected';} ?>"><a href="<?php echo URL; ?>tabel">Table Information</a></li>
                <li class="<?php if ($data['aktif'] == 'informasi') {echo 'selected';} ?>"><a href="<?php echo URL; ?>informasi">Potential Information</a></li>
                <li class="<?php if ($data['aktif'] == 'peta') {echo 'selected';} ?>"><a href="<?php echo URL; ?>musimap">Map</a></li>
                <li class="<?php if ($data['aktif'] == 'home') {echo 'selected';} ?>"><a href="<?php echo URL; ?>">Home</a></li>
        </div>
        </div>