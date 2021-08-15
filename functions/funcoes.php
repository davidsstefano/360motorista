<?php
//verifica se a data ou data/hora é valido (retorna true ou false)
function fncIsDate($date)
{
    $retorno_temp = false;
    if(strlen($date) > 7 && strpos($date, '-') > 0){
        $array_date = explode('-', $date);
        $retorno_temp = checkdate($array_date[1], $array_date[2], $array_date[0]);
    }
    return $retorno_temp;
}
?>