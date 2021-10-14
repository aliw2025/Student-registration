<?php

// class for connection with mysql database
class MysqlHandler
{

    private $host;
    private $user;
    private $password;
    private $dbname;
    private $dsn;
    private $pdo;

    function __construct($host, $user, $password, $dbname)
    {

        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->createDsn();
        $this->createPDO();
    }
    function createDsn()
    {
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    }
    function getDsn()
    {

        return $this->dsn;
    }
    function createPDO()
    {
        try {
            $this->pdo =  new PDO($this->dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function fetchAllFromTable($table)
    {
        $sql = 'select * from ' . $table;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([]);
        $all = $stmt->fetchAll();
        return $all;
    }
}
