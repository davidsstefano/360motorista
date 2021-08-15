<?php
require_once '../class/conn.php';

$conn = new ConnDb();



session_start();
$id_motorista = (isset($_SESSION['id_motorista'])) ? $_SESSION['id_motorista'] : null;
if (!isset($_SESSION['id_motorista'])) {
    session_destroy(header("location: login.php"));

    exit;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_formulario.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/app_formulario.js"></script>
    <title>Document</title>
</head>

<body>


    </header>

    <div class="container_login">


        <img id="img_logo" src="../img/logo_site_360.jpeg" alt="Logo">
        <div class="form-box">

            <form action="../api/api_cadastrocarro.php" method="POST" enctype="multipart/form-data">
                <div>
                    <h2>Cadastro</h2>
                </div>
                <div>
                    <label for="modelo">Digite o Modelo: </label>
                    <input type="text" id="modelo" name="modelo" placeholder="modelo" maxlength="40" required class="form-input">
                </div>
                <div>
                    <label for="placa">Digite o placa: </label>
                    <input type="text" id="placa" name="placa" placeholder="placa" maxlength="40" required class="form-input">
                </div>
                <div>
                    <label for="ano">Digite o ano: </label>
                    <input type="text" id="ano" name="ano" placeholder="ano" maxlength="13" required class="form-input">
                </div>

                <div>
                    <label for="foto_c">Insira sua o foto: </label>
                    <input type="file" name="foto_c" placeholder="foto_c" maxlength="40" required class="form-input">
                </div>
                <div>
                    <input type="hidden" name="id_motorista" value="<?php echo $_SESSION['id_motorista']; ?>" />
                </div>

                <div>
                    <input type="submit" nome="cadastrar" value="cadastrar" class="form-btn">
                </div>
            </form>
        </div>

    </div>


</body>

</html>