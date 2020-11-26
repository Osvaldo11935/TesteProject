<?php 
 class telefone {
public $idtelefone;
public $datacriacao;
public $dataactualizacao;
public $numerotelefone;
public $clienteid;
public $cliente;
public function getValueProp($nomeProp){return $this->$nomeProp;}
public function setValueProp($nomeProp,$valueProp){$this->$nomeProp = $valueProp;}
public function __construct(){$this->cliente=new  cliente();}
}