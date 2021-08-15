<?php
require_once '../class/conn.php';


$conn = new ConnDb();
// var_dump($id_motorista);
 


session_start();

$id_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : null;
if (!isset($_SESSION['id_usuario'])) {
    session_destroy(header("location: login.php"));

    exit;
}
// print_r($id_usuario);
// require_once '../api/carrega_chat.php';


exit;



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_formulario.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/chat.js"></script>

    <title>Usuario</title>
</head>

<body>




    <div class="container">
        <main>


            <div class="form-box">

                <form id="msg" enctype="multipart/form-data">
                    <div id="divConversa">


                        Sem Mensagens...
                    </div>
                    <div>
                        <input type="hidden" name="id_usuario" id="formUsuario" value="<?php echo $_SESSION['id_usuario']; ?>" />
                    </div>
                    <div>
                        <input type="hidden" name="id_motorista" id="formMotorista" value="<?php print_r($id_motorista); ?>" />
                    </div>

                    <br>
                    <div>
                        <input type="hidden" name="dia" value="<?php echo $data; ?>">
                    </div>
                    <div>
                        <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                    </div>
                    <div>
                        <label for="texto">Enviar mensagem: </label>
                        <input type="text" name="texto" placeholder="mensagem" class="form-input" required>
                    </div>
                    <div>
                        <input type="submit" value="Enviar" class="form-btn">
                    </div>



                </form>

            </div>
        </main>
    </div>
</body>

</html>