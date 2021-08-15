<?php


require_once '../class/conn.php';


$conn = new ConnDb();
$control = 0; //retorno padrao de erro.

$id_motorista = (isset($_POST['id_motorista'])) ? $_POST['id_motorista'] : null;

if (isset($_POST['id_motorista'])) {



    $sql = "SELECT id_motorista FROM motorista WHERE id_motorista = :id_motorista ";
    $result = $conn->select($sql, array('id_motorista' => $id_motorista));
    if (count($result) == 1) {
        print_r($result);
        exit;    
        $control = 1; //retorno de sucesso de usuario.
        $id = $result[0]['id_usuario']; //id retorno token.
    }
}

header('Content-Type: application/json; charset=utf-8');

echo '{"controle":' . $control . '}';
