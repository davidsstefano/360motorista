<?php
require_once '../class/conn.php';

$conn = new ConnDb();
date_default_timezone_set('America/Sao_Paulo');



session_start();
$id_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : null;
if (!isset($_SESSION['id_usuario'])) {
    session_destroy(header("location: login.php"));

    exit;
}

$sql = "SELECT * FROM motorista ";
$id_motorista = $conn->select($sql, []);




// echo ($id_usuario);
// exit;
// echo $data;
// echo $hora;

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
            <div id="conteiner-motorista" class="form-box">

                <form id="inichat" method="POST" enctype="multipart/form-data">

                    <input type="hidden" id="id_usuario" name="id_usuairo" value="<?php echo $id_usuario; ?>" />

                    <select name="id_motorista" id="id_motorista" class="form-control" required>
                        <option value="0" selected disabled>Selecione o motorista:</option>

                        <?php
                        foreach ($id_motorista as $output) {
                            echo '<option value="' . $output['id_motorista'] . '">' . $output['motorista'] . '</option>';
                        }
                        ?>
                    </select>
                </form>
                <div id="divConversa">

                </div>
                <form>
                    <div>
                        <input class="form-control txt-disabled" name="chat" id="chat" type="text">
                    </div>
                    <div>
                        <input type="submit" value="enviar" class="form-btn">
                    </div>
                </form>

            </div>

        </main>
    </div>
</body>

</html>1111111