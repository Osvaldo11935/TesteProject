<?php
include_once("rota.php");
$out = new autoload();
echo $out->_autoload("repository,r,helpModel,Models/telefone,Models/cliente");
$string = "Osvaldo";

//$frt = strrev(substr(strrev($string), 4));


$helpModel =  new helpModel();
$helpModel->getProp();
$data = array("nome", "sobrenome");
$telefone =  new telefone();
$telefone->numerotelefone = "992466962";
$var = new cliente();
$telefone->setValueProp("numerotelefone", "Osvaldo");
$numerotelefone = $telefone->getValueProp("numerotelefone");
$var->nome = "dfdddddddd";
$var->sobrenome = "errrrrrr";
$var->telefone = $telefone;
$t = new repository;
$tss = new nome();
$data = array($var);
$t->obj($data);
$query = $t->add();


////echo $dee;

//var_dump(new pessoa());
