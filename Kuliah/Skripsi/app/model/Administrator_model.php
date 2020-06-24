<?php
class Administrator_model
{

    private $_pdo;
    private $tabel = 'wisata';

    public function __construct()
    {
        $this->_pdo = Connection::get()->connect();
    }
    public function login_cek($user, $pass)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username LIMIT 1");
        $this->db->bind(':username', $user);
        $row = $this->db->single_sec();
        return $row;
    }

    public function tambah($data)
    {
        $sql = "INSERT INTO $this->tabel(nama, deskripsi) 
        VALUES(:nama, :deskripsi)";

        $this->db->query($sql);
        $this->db->bind(':nama', $data['nama']);
        //$this->db->bind(':jenis', $data['jenis']);
        //$this->db->bind(':geom', $data['geom']);
        $this->db->bind(':deskripsi', $data['deskripsi']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
