<?php 
 class cliente {
public $idcliente;
public $datacriacao;
public $dataactualizacao;
public $nome;
public $sobrenome;
public $morada;
public function getValueProp($nomeProp){return $this->$nomeProp;}
public function setValueProp($nomeProp,$valueProp){$this->$nomeProp = $valueProp;}
public function __construct(){}
}