<?php

class Tabel_model
{
    private $_pdo;
    public function __construct()
    {
        $this->_pdo = Connection::get()->connect();
    }
    public function getKecamatan()
    {
        // $query = ("SELECT table_name
        //         FROM information_schema.tables
        //         WHERE table_schema= 'public'
        //              AND table_type='BASE TABLE'
        //         ORDER BY table_name");
        //$tableList = [];
        // while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        // $tableList[] = $row['table_name'];
        // }
        // return $tableList;

        $query = ("SELECT k.id, k.kecamatan
                FROM batas_kecamatan k
                ORDER BY k.kecamatan");

        $stmt = $this->_pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTablesByIdKecamatan($id)
    {
        if (isset($_GET["id"])) {
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

            WHERE k.id = suq.id_kec AND k.id = :id";

            $stmt = $this->_pdo->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}
