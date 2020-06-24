<?php

class Info_model
{
    protected $_db;
    protected $_tabel     = 'remark';
    protected $_tabel_kec = 'batas_kecamatan';

    public function __construct()
    {
        $this->_db = new Database;
    }

    public function getKecamatanInfo()
    {
        $sql = "SELECT k.id, k.kecamatan
		FROM $this->_tabel_kec k
		ORDER BY k.kecamatan";
        $stmt = $this->_db->query($sql);
        return $this->_db->resultSet();
    }

    public function getKecamatanInfoById($q)
    {
        //$q=$_GET['q'];
        
        $sql = "SELECT suq.sektor, suq.potensi, suq.Jenis, k.kecamatan, ST_X(ST_AsText(suq.geom,7)) AS X, ST_Y(ST_AsText(suq.geom,7)) AS Y

            FROM $this->_tabel_kec k, (SELECT ind.id_kec, ids.nama AS potensi, p.nama_potensi AS Jenis, r.nama_remark AS sektor, r.image, ind.geom
            FROM potensi_daerah p
            INNER JOIN $_tabel r ON r.id_potensi = p.id
            INNER JOIN perindustrian ind ON ind.id_remark = r.id
            INNER JOIN industri ids ON ind.id_industri = ids.id
            INNER JOIN $this->_tabel_kec k ON ind.id_kec = k.id
            UNION ALL
            SELECT ika.id_kec, ikn.nama AS potensi, p.nama_potensi AS Jenis, r.nama_remark AS sektor, r.image, ika.geom
            FROM potensi_daerah p
            INNER JOIN $_tabel r ON r.id_potensi = p.id
            INNER JOIN perikanan ika ON ika.id_remark = r.id
            INNER JOIN ikan ikn ON ika.id_ikan = ikn.id
            INNER JOIN $this->_tabel_kec k ON ika.id_kec = k.id
            UNION ALL
            SELECT ke.id_kec, keb.nama AS potensi, p.nama_potensi AS Jenis, r.nama_remark AS sektor, r.image, ke.geom
            FROM potensi_daerah p
            INNER JOIN $_tabel r ON r.id_potensi = p.id
            INNER JOIN perkebunan ke ON ke.id_remark = r.id
            INNER JOIN kebun keb ON ke.id_kebun = keb.id
            INNER JOIN $this->_tabel_kec k ON ke.id_kec = k.id
            UNION ALL
            SELECT ta.id_kec, tam.nama AS potensi, p.nama_potensi AS Jenis, r.nama_remark AS sektor, r.image, ta.geom
            FROM potensi_daerah p
            INNER JOIN $_tabel r ON r.id_potensi = p.id
            INNER JOIN pertambangan ta ON ta.id_remark = r.id
            INNER JOIN tambang tam ON ta.id_tambang = tam.id
            INNER JOIN $this->_tabel_kec k ON ta.id_kec = k.id) AS suq

            WHERE k.id = suq.id_kec AND k.id = :q";

        $this->_db->query($sql);
        $this->_db->bind('q', $q);
        return $this->_db->resultSet();
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
}
