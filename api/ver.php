<?php
require_once '../class/conn.php';

$conn = new ConnDb();
session_start();
//capturando os filtros pro  retorno do JSON

$usuario = (isset($_SESSION['id_usuario']))  ? $_SESSION['id_usuario'] : null; 
$motorista = (isset($_POST['id_motorista'])) ? $_POST['id_motorista'] : null; 




//criando o array do filtro SQL
$tipo_consulta = 'vazio';
$sql_bind = "";
$array_filtro_sql = [];

//validando os filtros

if(strlen($usuario) > 0 && is_numeric($usuario)){
    $sql_bind = "usu.id_usuario = :usuario";
    $array_filtro_sql = array('usuario' => $usuario);
    $tipo_consulta = 'usuario';

} 

if(strlen($motorista) > 0 && is_numeric($motorista)){
    $sql_bind = "mot.id_motorista = :motorista";
    $array_filtro_sql = array('motorista' => $motorista);
    $tipo_consulta = 'motorista';

} 




//verificar se querystring (endereço do navegador) tem o id_usuario ou id_motorista. se nao tiver um ou outro, dar erro
if($tipo_consulta == 'vazio'){
    header('HTTP/1.1 400 Unauthorized', true, 400);
    exit();
}
//instanciando a classe de conexao
$conn = new ConnDb();
//criando a variavel de retorno para o json
$json_retorno = null;
//selecionar os mensagen
$sql = "

select 
usu.id_usuario,
mot.id_motorista,
msg.id_mensagem,
usu.nome,
mot.motorista,
msg.texto,
msg.hora,
msg.dia

from
mensagens msg 
inner join
usuario usu
on 
msg.id_usuario = usu.id_usuario
inner join
motorista mot
on
msg.id_motorista = mot.id_motorista

WHERE
    $sql_bind
ORDER BY
    dia, hora
";


$dados_db = $conn->select($sql, $array_filtro_sql);
if(count($dados_db) > 0){
    $json_retorno = $dados_db;
}

// var_dump($dados_db) ;
// exit();

//escrevendo o resultado do banco em JSON para a API
$json = array(
    'status' => 'ok',
    'conversa' => $json_retorno
    
);


//formatando o cabecalho do retorno como JSON
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
echo json_encode($json);

