<?php

require_once '../class/conn.php';
require_once '../functions/foto_carro.php';
$conn = new ConnDb();
session_start();



if (isset($_POST['modelo'])) {
    $modelo = addslashes($_POST['modelo']);
    $placa = addslashes($_POST['placa']);
    $foto_c = $nomeArquivo;
    $ano = addslashes($_POST['ano']);
    $id_motorista = addslashes($_POST['id_motorista']);




    $sql = "INSERT INTO  carros (modelo, placa, foto_c , ano, id_motorista )VALUES(:modelo, :placa, :foto_c, :ano ,:id_motorista)";

    $novo_id = $conn->insert($sql, array('modelo' => $modelo, 'placa' => $placa, 'foto_c' => $foto_c, 'ano' => $ano, 'id_motorista' => $id_motorista));


    if ($novo_id > 0) {

        echo "sucesso!!";
        header("Location: ../public/pag_motorista.php");
    }
}
