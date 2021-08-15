<?php

require_once '../class/conn.php';
require_once '../funcoes/funcoes.php';
$conn = new ConnDb();

//capturando os dados da consulta
$partida = (isset($_POST['partida'])) ? $_POST['partida'] : null; 
$destino = (isset($_POST['destino'])) ? $_POST['destino'] : null;
$dia = (isset($_POST['dia'])) ? $_POST['dia'] : null;
$motorista = (isset($_POST['motorista'])) ? $_POST['motorista'] : null;


// header('Content-Type: application/json; charset=utf-8');
// echo '{"horarios": ["08:00", "09:00", "10:00"]}';
// exit();



if(strlen($partida) > 0 && is_numeric($partida)){
    $sql_bind = "emp.id_partida = :partida";
    $array_filtro_sql = array('partida' => $partida);
    $tipo_consulta = 'partida';

} 

//verificando se existe filtro por tipo de destino
if(strlen($destino) > 0 && is_numeric($destino) && $destino != 0){
    //incrementando o campo de tipo no bind e no array para o sql
    $sql_bind = $sql_bind . ' AND ser.id_destino = :destino';
    $array_filtro_sql['destino'] = $destino;
}
// echo $dia;
// exit;

//verificando se existe uma data no filtro e se existir, validar
if(strlen($dia) > 7){
    //verificando se a data é valida (usando nossa super funcao)
    if(($dia)){
        //incrementando o campo de data no bind e no array com os dados para o sql
        $sql_bind = $sql_bind . ' AND agendamento_data = :dia';
        $array_filtro_sql['dia'] = $dia;
    }

}

if(strlen($id_motorista) > 0 && is_numeric($id_motorista)){
    $sql_bind = "mot.id_motorista = :id_motorista";
    $array_filtro_sql = array('id_motorista' => $id_motorista);
    $tipo_consulta = 'motorista';

} 

//  echo $partida;echo '<br>';
//  echo $destino;echo '<br>';
// echo $dia;
//  echo '<br>';
// echo $sql_bind;
//  exit();

//verificar se querystring (endereço do navegador) tem o id_usuario ou id_partida. se nao tiver um ou outro, dar erro
if($tipo_consulta == 'vazio'){
    header('HTTP/1.1 400 Unauthorized', true, 400);
    exit();
}
//instanciando a classe de conexao
$conn = new ConnDb();
//criando a variavel de retorno para o json
$json_retorno = null;
//selecionar os agendamentos
$sql = "
select
	agd.id_agendamento,agd.horario,agd.dia,agd.partida,agd.destino,mot.id_motorista
from
	horarios AS hr
left join
	agendamento AS agd
ON 
	hr.horarios = agd.horario
    
inner join
motorista mot
on
agd.id_motorista = mot.id_motorista

where
hr.horarios

ORDER BY
hr.horarios";

// print_r($sql);
// print_r( $array_filtro_sql);
// exit();

$dados_db = $conn->select($sql, $array_filtro_sql);
if(count($dados_db) > 0){
    $json_retorno = $dados_db;
 
}
print_r($json_retorno);
exit();

//escrevendo o resultado do banco em JSON para a API
$json = array(
    'status' => 'ok',
    'Agendamentos' => $json_retorno,
    
);


header('Content-Type: application/json; charset=utf-8');
echo json_encode($json);

