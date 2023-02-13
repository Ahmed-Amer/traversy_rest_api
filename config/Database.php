<?php


class Database
{
    private $dsn='mysql:host=localhost;dbname=blogs';
    private $username = 'root';
    private $password = '';
    private $conn = null;
    private $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );




    //DB Connect
    public function connect()
    {
        try{
            $this->conn = new PDO($this->dsn , $this->username , $this->password , $this->options);
        }
        catch(PDOException $e){
            echo 'Failed to connect ' . $e->getMessage();
        }
        return $this->conn;
    }



}
