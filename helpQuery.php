<?php
interface IhelpQuery
{
    public function selectCreate($tabela);
    public function selectOneCreate($obj, $valor);
    public function insertCreate($obj);
    public function updateCreate($obj, $id, $fieKey);
}
class helpQuery implements IhelpQuery
{
    public function selectCreate($tabela)
    {
        $query = "Select*from {$$tabela}";
        return $query;
    }
    public function selectOneCreate($obj, $valor)
    {
        for ($i = 0; $i < Count($obj); $i++) {
            foreach ($obj[$i] as $item => $value) {
                if (!is_object($value)) {
                    if ($item != "nomeObjecto") {
                        $values[] = "{$item} like '%{$valor}%'";
                    } else
                        $tabela = $value;
                }
            }
            $values = implode(" or ", $values);
        }
        $query = "Select*from {$tabela} where {$values}";
        return $query;
    }
    public function insertCreate($obj)
    {
        $query = array();
        for ($i = 0; $i < Count($obj); $i++) {
            foreach ($obj[$i] as $item => $value) {
                if (is_object($value)) {
                    foreach ($value as $item1 => $value1) {
                        if ($item1 == "nomeObjecto")
                            $tabelaRef = $value1;
                        else {
                            $field1[] = $item1;
                            $values1[] = "'{$value1}'";
                        }
                    }
                    $field1 = implode(",", $field1);
                    $values1 = implode(",", $values1);
                    $query[] = "Insert into {$tabelaRef} ({$field1}) values({$values1})";
                    $field1 = null;
                    $values1 = null;
                } else {
                    if ($item == "nomeObjecto")
                        $tabela = $value;
                    else {
                        $field[] = $item;
                        $values[] =  "'{$value}'";
                    }
                }
            }
            $field = implode(",", $field);
            $values = implode(",", $values);
            $query[] = "Insert into {$tabela} ({$field}) values({$values})";
        }
        return implode(";", $query);
    }
    public function updateCreate($obj, $id, $fieKey)
    {
        $query = array();
        for ($i = 0; $i < Count($obj); $i++) {
            foreach ($obj[$i] as $item => $value) {
                if (!is_object($value)) {
                    if ($item == "nomeObjecto")
                        $tabela = $value;
                    else {
                        $values[] = "$item='{$value}'";
                    }
                }
            }
            $values = implode(",", $values);
            $query[] = "Update  {$tabela} set {$values} where {$fieKey}='{$id}'";
        }
        return implode(";", $query);
    }
    public function deleteCreate()
    {
    }
}
