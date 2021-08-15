<?php


require_once '../class/conn.php';


$conn = new ConnDb();
$control = 0; //retorno padrao de erro.
date_default_timezone_set('America/Sao_Paulo');

$email = addslashes($_POST['email']);
$senha = md5(addslashes($_POST['senha']));
$date = time(); //hora atual.
$token = md5($email . $date); //token de login.

if (isset($_POST['email'])) {
    // print_r($_POST);
    // exit;  


    $sql = "SELECT  id_usuario ,email , senha FROM usuario WHERE email = :email AND senha = :senha";
    $result = $conn->select($sql, array('email' => $email, 'senha' => $senha));
    if (count($result) == 1) {
          
        $control = 1; //retorno de sucesso de usuario.
        $id = $result[0]['id_usuario']; //id retorno token.
      


            session_start();
        $_SESSION['id_usuario'] = $id;
        $_SESSION['token'] = $token;
        //atualizaçao token na tabela usuario.
        $sql = "UPDATE  usuario set token = :token WHERE id_usuario =:id";
        $novo_token = $conn->update_delete($sql, array('token' => $token, 'id' => $id));
    } else {
        $sql = "SELECT id_motorista, email , senha FROM motorista WHERE email = :email AND senha = :senha";
        $result = $conn->select($sql, array('email' => $email, 'senha' => $senha));
        if (count($result) == 1) {

            $control = 2; //retorno de sucesso de usuario.
            $id = $result[0]['id_motorista']; //id retorno token.
           


                session_start();
            $_SESSION['id_motorista'] = $id;
            $_SESSION['token'] = $token;
            //atualizaçao token na tabela usuario.

            $sql = "UPDATE  motorista set token = :token WHERE id_motorista =:id";
            $novo_token = $conn->update_delete($sql, array('token' => $token, 'id' => $id));
        }
    }
}

header('Content-Type: application/json; charset=utf-8');

echo '{"controle":' . $control . '}';

