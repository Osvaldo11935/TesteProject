<?php
class dbConfig
{
    private $query;
    private $server;
    private $username;
    private $password;
    private $database;
    private $connect;
    public function __construct()
    {
        $this->server = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "teste";
        self::connect();
    }
    public function connect()
    {
        $this->connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);
    }
    public function query($query)
    {
        $this->query = $query;
    }
    public  function  _execSQL()
    {
        return mysqli_query($this->connect, $this->query);
    }
}
