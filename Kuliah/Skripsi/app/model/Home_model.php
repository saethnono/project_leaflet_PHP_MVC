<?php
class Home_model
{
    protected $_db;
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
}
