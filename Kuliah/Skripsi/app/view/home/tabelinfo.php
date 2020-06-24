<?php
$data_arr = [];
foreach ($data['kecinfo'] as $keca) {
    //echo "<tr><td>{$kecID}</td><td>{$keca->sektor}</td><td>{$keca->potensi}</td><td>{$keca->jenis}</td><td>{$keca->kecamatan}</td><td>{$keca->x}</td><td>{$keca->y}</td></tr>";
    $sektor    = $keca->sektor;
    $potensi   = $keca->potensi;
    $jenis     = $keca->jenis;
    $kecamatan = $keca->kecamatan;
    $x         = $keca->x;
    $y         = $keca->y;

    $data_arr = ["sektor" => $sektor, "potensi" => $potensi, "jenis" => $jenis, "kecamatan" => $kecamatan, "x" => $x, "y" => $y];
}
echo json_encode($data_arr);