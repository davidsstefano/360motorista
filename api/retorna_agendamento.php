<?php
require_once '../class/conn.php';
require_once '../functions/funcoes.php';



session_start();


//capturando os filtros pro  retorno do JSON

$id_motorista = (isset($_SESSION['id_motorista'])) ? $_SESSION['id_motorista'] : null; 
$data_filtro = (isset($_GET['date'])) ? $_GET['date'] : null;


//criar funcao token


//criando o array do filtro SQL
$tipo_consulta = 'vazio';
$sql_bind = "";
$array_filtro_sql = [];
//validando os filtros



if(strlen($id_motorista) > 0 && is_numeric($id_motorista)){
    $sql_bind = "mot.id_motorista = :id_motorista";
    $array_filtro_sql = array('id_motorista' => $id_motorista);
    $tipo_consulta = 'motorista';

} 


//verificando se existe filtro por tipo de servico

// echo $data_filtro;
// exit;

//verificando se existe uma data no filtro e se existir, validar
if(strlen($data_filtro) > 7){
    //verificando se a data é valida (usando nossa super funcao)
    if(fncIsDate($data_filtro)){
        //incrementando o campo de data no bind e no array com os dados para o sql
        $sql_bind = $sql_bind . ' AND dia = :date';
        $array_filtro_sql['date'] = $data_filtro;
    }

}


//verificar se querystring (endereço do navegador) tem o id_usuario ou id_empresa. se nao tiver um ou outro, dar erro
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

agd.id_agendamento,
agd.id_motorista,
agd.id_usuario,
usu.nome,
mot.motorista,
agd.km,
agd.valor,
agd.partida,
agd.destino,
agd.dia,
agd.horario,
agd.status_c,
car.modelo,
car.foto_c,
car.placa,
mot.foto_m

from

agendamento agd 
inner join

usuario usu
on 
agd.id_usuario = usu.id_usuario

inner join
motorista mot
on
agd.id_motorista = mot.id_motorista

inner join
carros car
on
car.id_motorista = mot.id_motorista

WHERE
    $sql_bind
    ORDER BY
    dia, horario
";

// var_dump($array_filtro_sql);
// exit();

$dados_db = $conn->select($sql, $array_filtro_sql);
if(count($dados_db) > 0){
    $json_retorno = $dados_db;
}
// var_dump($json_retorno);
// exit();

//escrevendo o resultado do banco em JSON para a API
$json = array(
    'status' => 'ok',
    'agendamentos' => $json_retorno
    
);
// var_dump($json);
// exit();
   


//formatando o cabecalho do retorno como JSON
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
echo json_encode($json);
