<?php 
 class usuarios {
public $id;
public $nome;
public $email;
public function getValueProp($nomeProp){return $this->$nomeProp;}
public function setValueProp($nomeProp,$valueProp){$this->$nomeProp = $valueProp;}
public function __construct(){$this->cliente=new  cliente();}
}