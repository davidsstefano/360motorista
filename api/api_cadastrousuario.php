<?php

require_once '../class/conn.php';
require_once '../functions/upload.php';

$conn = new ConnDb();

// var_dump($conn);
if (isset($_POST['nome'])) 



    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $senha = md5(addslashes($_POST['senha']));
   
    // $adm = "1";

    $sql = "INSERT INTO usuario (nome,email,telefone,senha)VALUES(:nome,:email,:telefone,:senha)";

    $novo_id = $conn->insert($sql,array('nome'=>$nome,'email'=>$email,'telefone'=>$telefone,'senha'=>$senha,));
    

    if ($novo_id > 0) {

        echo "sucesso!!";
        header("Location: ../public/login.php");
    }


