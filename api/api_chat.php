<?php
    require_once '../class/conn.php';
   
    $conn = new ConnDb();
    session_start();

    if (isset($_POST['id_usuario'])) {
        $id_usuario = addslashes($_POST['id_usuario']);
        $id_motorista = addslashes($_POST['id_motorista']);
        $texto = addslashes($_POST['texto']);
        $dia = addslashes($_POST['dia']);
        $hora = addslashes($_POST['hora']);
        
        
    
    
    
    
        $sql = "INSERT INTO  mensagens (id_usuario, id_motorista, texto, dia, hora )VALUES(:id_usuario, :id_motorista, :texto, :dia, :hora )";
    
        $novo_id = $conn->insert($sql, array('id_usuario' => $id_usuario, 'id_motorista' => $id_motorista, 'texto' => $texto, 'dia'=> $dia, 'hora' => $hora ));
    
    
        if ($novo_id > 0) {
    
            echo "mensagem enviada com sucesso!!";
        }
    }


?>