<?php

class Database{    
    public $serverName = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbname = 'news';
    public $charset='utf8';
    public $connection;

    function __construct() {
        $this->connection = new PDO("mysql:host=".$this->serverName.";dbname=".$this->dbname.";charset=".$this->charset,
                    $this->username, $this->password);
    }

    public function getAll($query) {
        $stm = $this->connection->query($query);
        $stm->execute();

        return $stm->fetchAll();
    }
    public function getFirst($query) {
        $stm = $this->connection->query($query);
        $stm->execute();

        return $stm->fetch($query);
    }

    public function queryExecute($query) {
        $stm = $this->connection->query($query);

        return $stm->execute();
    }

}