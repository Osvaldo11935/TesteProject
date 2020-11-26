<?php
include("dbConfig.php");
class helpModel extends dbConfig
{
    private $results;
    private $obj;
    private $server;
    private $username;
    private $password;
    private $database;
    private $connect;
    public function setTable()
    {
    }
    public function setProp()
    {
    }
    public function setTypeprop()
    {
    }
    public function getTable()
    {
        self::query("Show Tables");
        foreach (self::_execSQL() as $row) {
            $this->result[] = $row["Tables_in_teste"];
        }
        return  $this->result;
    }
    public function getProp()
    {
        $tbRef = "";
        $tb = "";
        foreach (self::getTable() as $tb_list) {
            $tb = $tb_list;
            $this->results[] = "<?php \n class $tb {";
            self::query("show columns from $tb_list");
            foreach (self::_execSQL() as $row) {
                $this->results[] = "public $" . $row["Field"] . ";";
            }
            self::query("SELECT * FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = 'teste' AND TABLE_NAME = '$tb_list' AND REFERENCED_TABLE_NAME IS NOT NULL ");
            foreach (self::_execSQL() as $row_list) {
                $this->results[] = "public $" . $row_list["REFERENCED_TABLE_NAME"] . ";";
                $tbRef = '$this->' . $row_list["REFERENCED_TABLE_NAME"] . '=new  ' . $row_list["REFERENCED_TABLE_NAME"] . '();';
            }

            $this->results[] = 'public function getValueProp($nomeProp){return $this->$nomeProp;}';
            $this->results[] = 'public function setValueProp($nomeProp,$valueProp){$this->$nomeProp = $valueProp;}';
            $this->results[] = "public function __construct(){" . $tbRef . "}";
            $this->results[] = "}";
            self::createFile("Models/$tb.php", implode("\n", $this->results));
            $this->results = null;
        }

        return  $this->result;
    }
    public function filedir($arquivo, $texto)
    {
        $fp = fopen($arquivo, "a+");
        fwrite($fp, $texto);
        fclose($fp);
    }
    public function createFile($url, $texto)
    {
        $url = explode("/", $url);
        $uri = "";
        foreach ($url as $dir) {
            if (!is_dir($dir) && !strpos($dir, ".")) {
                mkdir($dir);
                $uri .= $dir . "/";
            } else {
                if (!strpos($dir, "."))
                    $uri .= $dir . "/";
                else {
                    $uri .= $dir;
                    if (!file_exists($uri)) {
                        self::filedir($uri, $texto);
                    }
                }
            }
        }
    }
    public function createModel()
    {
        // self::query(self::insertCreate($this->obj));
        self::_execSQL();
    }
    public function get()
    {
        //self::query(self::insertCreate($this->obj));
        self::_execSQL();
    }
    public function getWhere()
    {
        //self::query(self::insertCreate($this->obj));
        self::_execSQL();
    }
    public function update()
    {
        // self::query(self::insertCreate($this->obj));
        self::_execSQL();
    }
    public function delete()
    {
        // self::query(self::insertCreate($this->obj));
        self::_execSQL();
    }
}
