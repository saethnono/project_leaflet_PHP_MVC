<?php

class Peta_model
{
    protected $_db;
    protected $_tabel     = 'remark';
    protected $_tabel_kec = 'batas_kecamatan';

    public function __construct()
    {
        $this->_db = new Database;
    }

    public function getPotensiDaerahMap()
    {
        $this->_db->query("SELECT p.id, ids.nama, p.nama_potensi AS potensi, r.nama_remark AS remark, r.image, k.kecamatan, ST_AsGeoJSON((ind.geom),6) AS geojson
            FROM potensi_daerah p
            INNER JOIN $this->_tabel r ON r.id_potensi = p.id
            INNER JOIN perindustrian ind ON ind.id_remark = r.id
            INNER JOIN industri ids ON ind.id_industri = ids.id
            INNER JOIN batas_kecamatan k ON ind.id_kec = k.id
            UNION ALL
            SELECT p.id, ikn.nama, p.nama_potensi AS potensi, r.nama_remark AS remark, r.image, k.kecamatan, ST_AsGeoJSON((ika.geom),6) AS geojson
            FROM potensi_daerah p
            INNER JOIN $this->_tabel r ON r.id_potensi = p.id
            INNER JOIN perikanan ika ON ika.id_remark = r.id
            INNER JOIN ikan ikn ON ika.id_ikan = ikn.id
            INNER JOIN batas_kecamatan k ON ika.id_kec = k.id
            UNION ALL
            SELECT p.id, keb.nama, p.nama_potensi AS potensi, r.nama_remark AS remark, r.image, k.kecamatan, ST_AsGeoJSON((ke.geom),6) AS geojson
            FROM potensi_daerah p
            INNER JOIN $this->_tabel r ON r.id_potensi = p.id
            INNER JOIN perkebunan ke ON ke.id_remark = r.id
            INNER JOIN kebun keb ON ke.id_kebun = keb.id
            INNER JOIN batas_kecamatan k ON ke.id_kec = k.id
            UNION ALL
            SELECT p.id, tam.nama, p.nama_potensi AS potensi, r.nama_remark AS remark, r.image, k.kecamatan, ST_AsGeoJSON((ta.geom),6) AS geojson
            FROM potensi_daerah p
            INNER JOIN $this->_tabel r ON r.id_potensi = p.id
            INNER JOIN pertambangan ta ON ta.id_remark = r.id
            INNER JOIN tambang tam ON ta.id_tambang = tam.id
            INNER JOIN batas_kecamatan k ON ta.id_kec = k.id");
        $hasil = $this->_db->resultSet();

        $features = [];
        foreach ($hasil as $row) {
            unset($row['geom']); //untuk menghilangkan atau tidak men-set data geom
            $geometry = $row['geojson'] = json_decode($row['geojson']);
            unset($row['geojson']);
            $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
            array_push($features, $feature);
        }
        $featureCollection = ["type" => "FeatureCollection", "features" => $features]; //membuat koleksi pada feature

        header('Content-type: application/json');
        echo json_encode($featureCollection, JSON_NUMERIC_CHECK);

    }
    public function getPotensiDaerah()
    {
        $sql = "SELECT p.id, p.nama_potensi as nama, p.deskripsi
		FROM potensi_daerah p
		ORDER BY p.nama_potensi";
        $stmt = $this->_db->query($sql);
        return $this->_db->resultset();
    }
    public function getPotensiDaerahById($id)
    {
        $sql = "SELECT p.*, r.nama_remark AS sektor
        FROM  potensi_daerah p
        INNER JOIN $this->_tabel r ON p.id = r.id_potensi
        WHERE p.id = :id";

        $this->_db->query($sql);
        $this->_db->bind(':id', $id);
        return $this->_db->resultset();
    }
    public function cariDataPersebaran()
    {
        $keyword = $_POST['keyword'];
        $sql     = "SELECT a.id, a.nama, e.nama as alamat, b.keterangan[1], c.tarif[1] as join, c.tarif[2] as private, d.nama as fasilitas
        FROM $this->_tabel a
        LEFT JOIN satu_hari as b on b.id_pers=a.id
        LEFT JOIN dua_hari as f on f.id_pers=a.id
        LEFT JOIN tiga_hari as g on g.id_pers=a.id
        LEFT JOIN empat_hari as h on h.id_pers=a.id
        LEFT JOIN keterangan as i on i.id_pers=a.id
        LEFT JOIN alamat as e on a.id_alamat=e.id
        LEFT JOIN tarif as c on b.id_tarif=c.id
        LEFT JOIN fasilitas as d on b.id_fas=d.id
        WHERE a.nama ILIKE :keyword
        OR b.keterangan ILIKE :keyword
        c.tarif[1] ILIKE :keyword OR
        c.tarif[2] ILIKE :keyword OR
        d.nama ILIKE :keyword OR
        OR kategori.nama ILIKE :keyword";
        $this->_db->query($sql);
        $this->_db->bind(':keyword', "%$keyword%");
        return $this->_db->resultset();
    }
    public function getIndustri()
    {
        $this->_db->query("SELECT a.id, i.nama, k.kecamatan, r.nama_remark AS remark, r.image, ST_AsGeoJSON((a.geom),6) AS geojson
        FROM perindustrian a
        LEFT JOIN $this->_tabel AS r ON a.id_remark=r.id
        LEFT JOIN batas_kecamatan AS k ON a.id_kec=k.id
        LEFT JOIN industri AS i ON a.id_industri=i.id");
        $hasil = $this->_db->resultset_sec();

        $features = [];
        foreach ($hasil as $row) {
            unset($row['geom']); //untuk menghilangkan atau tidak men-set data geom
            $geometry = $row['geojson'] = json_decode($row['geojson']);
            unset($row['geojson']);
            $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
            array_push($features, $feature);
        }
        $featureCollection = ["type" => "FeatureCollection", "features" => $features]; //membuat koleksi pada feature

        header('Content-type: application/json');
        echo json_encode($featureCollection, JSON_NUMERIC_CHECK);
    }
    public function getPerikanan()
    {
        $this->_db->query("SELECT a.id, i.nama, k.kecamatan, r.nama_remark AS remark, r.image, ST_AsGeoJSON((a.geom),6) AS geojson
        FROM perikanan a
        LEFT JOIN $this->_tabel AS r ON a.id_remark=r.id
        LEFT JOIN batas_kecamatan AS k ON a.id_kec=k.id
        LEFT JOIN ikan AS i ON a.id_ikan=i.id");
        $hasil = $this->_db->resultset_sec();

        $features = [];
        foreach ($hasil as $row) {
            unset($row['geom']); //untuk menghilangkan atau tidak men-set data geom
            $geometry = $row['geojson'] = json_decode($row['geojson']);
            unset($row['geojson']);
            $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
            array_push($features, $feature);
        }
        $featureCollection = ["type" => "FeatureCollection", "features" => $features]; //membuat koleksi pada feature

        header('Content-type: application/json');
        echo json_encode($featureCollection, JSON_NUMERIC_CHECK);
    }
    public function getPerkebunan()
    {
        $this->_db->query("SELECT a.id, p.nama, k.kecamatan, r.nama_remark AS remark, r.image, ST_AsGeoJSON((a.geom),6) AS geojson
        FROM perkebunan a
        LEFT JOIN $this->_tabel AS r ON a.id_remark=r.id
        LEFT JOIN batas_kecamatan AS k ON a.id_kec=k.id
        LEFT JOIN kebun AS p ON a.id_kebun=p.id");
        $hasil = $this->_db->resultset_sec();

        $features = [];
        foreach ($hasil as $row) {
            unset($row['geom']); //untuk menghilangkan atau tidak men-set data geom
            $geometry = $row['geojson'] = json_decode($row['geojson']);
            unset($row['geojson']);
            $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
            array_push($features, $feature);
        }
        $featureCollection = ["type" => "FeatureCollection", "features" => $features]; //membuat koleksi pada feature

        header('Content-type: application/json');
        echo json_encode($featureCollection, JSON_NUMERIC_CHECK);
    }
    public function getPertambangan()
    {
        $this->_db->query("SELECT a.id, t.nama, k.kecamatan, r.nama_remark AS remark, r.image, ST_AsGeoJSON((a.geom),6) AS geojson
        FROM pertambangan a
        LEFT JOIN $this->_tabel AS r ON a.id_remark=r.id
        LEFT JOIN batas_kecamatan AS k ON a.id_kec=k.id
        LEFT JOIN tambang AS t ON a.id_tambang=t.id");
        $hasil = $this->_db->resultset_sec();

        $features = [];
        foreach ($hasil as $row) {
            unset($row['geom']); //untuk menghilangkan atau tidak men-set data geom
            $geometry = $row['geojson'] = json_decode($row['geojson']);
            unset($row['geojson']);
            $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
            array_push($features, $feature);
        }
        $featureCollection = ["type" => "FeatureCollection", "features" => $features]; //membuat koleksi pada feature

        header('Content-type: application/json');
        echo json_encode($featureCollection, JSON_NUMERIC_CHECK);
    }
    public function getKecamatan()
    {
        $this->_db->query("SELECT id, kecamatan, ST_AsGeoJSON((geom),6) AS geojson FROM batas_kecamatan;");
        $hasil = $this->_db->resultSet();

        $features = [];
        foreach ($hasil as $row) {
            //echo var_dump($row);
            unset($row['geom']); //untuk menghilangkan atau tidak men-set data geom
            $geometry = $row['geojson'] = json_decode($row['geojson']);
            unset($row['geojson']);
            $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
            array_push($features, $feature);
        }
        $featureCollection = ["type" => "FeatureCollection", "features" => $features]; //membuat koleksi pada feature

        header('Content-type: application/json');
        echo json_encode($featureCollection, JSON_NUMERIC_CHECK);
    }
}
