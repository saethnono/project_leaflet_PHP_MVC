<?php
class Connection
{
/**
 * Connection
 * @var type
 */
    private static $__conn;

    /**
     * Connect ke database dan mengembalikkan instansiasi dari object \PDO
     * @return \PDO
     * @throws \Exception
     */
    public function connect()
    {

        // membaca parameter didalam file config
        $params = parse_ini_file(APP . 'conf/database.ini');
        if ($params === false) {
            throw new \Exception("Error file koneksi!");
        }
        // connect ke postgresql database
        $conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            $params['host'],
            $params['port'],
            $params['database'],
            $params['user'],
            $params['password']);
        try
        {
            $pdo = new \PDO($conStr);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $th) {
            die($th->getMessage());
        }
    }
    /**
     * mengembalikkan instansiasi dari object Connection
     * @return type
     */
    public static function get()
    {
        if (null === static::$__conn) {
            static::$__conn = new static();
        }

        return static::$__conn;
    }

    protected function __construct()
    {

    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }
}
