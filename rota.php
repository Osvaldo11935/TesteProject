<?php
class autoload
{
    /*method responsavel por carregar as class
     *@param $class variavel responsavel por receber o nome da class.
    */
    function _autoload($class)
    {
        $rota = explode(',', $class);

        for ($i = 0; $i < Count($rota); $i++) {
            if (file_exists("{$rota[$i]}.php")) {
                include_once("{$rota[$i]}.php");
            } else {
                return "Class nao Existe";
            }
        }
    }
    /**method responsavel por instanciar uma class
     *@param $class variavel responsavel por receber o nome da class.
     */
    function _insta($class)
    {
        $rota = explode(',', $class);
        for ($i = 0; $i < Count($rota); $i++) {
            if (file_exists("{$rota[$i]}.php")) {
                return new $rota[$i] . "()";
            } else {
                return "Class nao Existe";
            }
        }
    }
}
