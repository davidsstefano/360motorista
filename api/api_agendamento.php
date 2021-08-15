<?php
require_once '../class/conn.php';

$conn = new ConnDb();
session_start();

if (isset($_POST['id_usuario'])) {
    $id_usuario = addslashes($_POST['id_usuario']);
    $id_motorista = addslashes($_POST['id_motorista']);
    $km = addslashes($_POST['km']);
    $valor = addslashes($_POST['valor']);
    $partida = addslashes($_POST['partida']);
    $destino = addslashes($_POST['destino']);
    $dia = addslashes($_POST['dia']);
    $horario = addslashes($_POST['horario']);
    $status_c = "aguardando";

    // print_r($_POST);
    // exit;






    $sql = "INSERT INTO  agendamento (id_usuario, id_motorista, km, valor, partida, destino, dia, horario,status_c )VALUES(:id_usuario, :id_motorista, :km, :valor, :partida, :destino, :dia, :horario, :status_c )";

    $novo_id = $conn->insert($sql, array('id_usuario' => $id_usuario, 'id_motorista' => $id_motorista, 'km' => $km, 'valor' => $valor, 'partida' => $partida, 'destino' => $destino, 'dia' => $dia, 'horario' => $horario, 'status_c' => $status_c));
    // print_r($novo_id);
    // exit;

    if ($novo_id > 0) {

        echo "mensagem enviada com sucesso!!";

        header("Location: ../public/pag_usuario.php");
    }
}
