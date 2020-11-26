<?php
include_once("helpQuery.php");
class repository extends helpQuery
{
    private $query;
    private $result;
    private $obj;
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
    public function obj($obj)
    {
        $this->obj = $obj;
    }
    public  function  _execmultSQL()
    {

        return mysqli_multi_query($this->connect, $this->query);
    }
    public  function  _execSQL()
    {
        return mysqli_query($this->connect, $this->query);
    }
    public function add()
    {
        self::query(self::insertCreate($this->obj));
        self::_execmultSQL();
    }
    public function get()
    {
        self::query(self::insertCreate($this->obj));
        self::_execSQL();
    }
    public function getWhere()
    {
        self::query(self::insertCreate($this->obj));
        self::_execSQL();
    }
    public function update()
    {
        self::query(self::insertCreate($this->obj));
        self::_execSQL();
    }
    public function delete()
    {
        self::query(self::insertCreate($this->obj));
        self::_execSQL();
    }
}
