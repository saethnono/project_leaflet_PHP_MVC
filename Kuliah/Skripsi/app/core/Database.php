<?php
class Database
{

    private $dbh = null;
    private $stmt = null;

    public function __construct()
    {
        $params = \parse_ini_file(APP . 'conf/Database.ini');
        if ($params === false) {
            throw new Exception("Ada kesalahan membaca koneksi database.");
        }
        $opsi = [\PDO::ATTR_PERSISTENT => true, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION];
        try {
            $this->dbh = new \PDO(
                'pgsql:host=' . $params['host'] . ';port=' . $params['port'] . ';dbname=' . $params['database'],
                $params['user'],
                $params['password'],
                $opsi
            );
        } catch (\PDOException $th) {
            die($th->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute()
    {
        return $this->stmt->execute();
    }
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function resultset_sec()
    {
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function single_sec()
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
    // transaksi
    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }
    public function endTransaction()
    {
        return $this->dbh->commit();
    }
    public function cancelTransaction()
    {
        return $this->dbh->rollBack();
    }
    //debug
    public function debugDumpParams()
    {
        return $this->stmt->debugDumpParams();
    }
}
