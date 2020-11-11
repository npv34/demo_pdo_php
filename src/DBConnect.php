<?php


class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = 'mysql:host=127.0.0.1;dbname=library';
        $this->username = 'root';
        $this->password = '123456@Abc';
    }

    function connect()
    {
        try {
            $pdo = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            exit();
        }
        return $pdo;
    }
}