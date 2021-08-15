<?php

require_once '../class/conn.php';


$conn = new ConnDb();
$control = 0;
// var_dump($control);
// exit;

if(isset($_POST[''])){

    $control == 1;
}
// var_dump($control);
// exit;

header('Content-Type: application/json; charset=utf-8');
   
echo '{"controle":'.$control.'}';


?>