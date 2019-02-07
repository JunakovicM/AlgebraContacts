<?php

class DB{

    private static $_instance = null;
    private $config;
    private $conn;
    private $query;
    private $error = false;
    private $results;
    private $count = 0;

    // Constructor
    private function __construct(){
        $this -> Config::get('database');

        $driver = $this->config['driver'];
        $db_name = $this->config['driver']['db'];
        $hos = $this->config['driver']['host'];
        $user = $this->config['driver']['user'];
        $pass = $this->config['driver']['pass'];
        $dsn = $driver . ':dbname=' . $db_name . 'host='  .$host;

        try {
            $this->conn = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

}




?>