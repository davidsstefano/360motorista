<?php
require_once '../class/conn.php';

$conn = new ConnDb();




session_start();
$id_usuario = (isset($_SESSION['id_usuario'])) ? $_SESSION['id_usuario'] : null;
if (!isset($_SESSION['id_usuario'])) {
    session_destroy(header("location: login.php"));

    exit;
}
$sql = "SELECT * FROM motorista ";
$id_motorista = $conn->select($sql, []);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/agenda.js"></script>

    <title>Usuario</title>
</head>

<body>
    <header>
        <img id="img_logo" src="../img/logo_site_360.jpeg" alt="Logo">
        <h1>
            360°
        </h1>

        <div class="bt-container">

            <button type="button" class="btn btn-success btn-lg btn-block" onclick="fncnovo()"> Novo Agendamento </button>
            <button type="button" class="btn btn-success btn-lg btn-block" onclick="fncchat()"> Chat </button>
            <a href="logout.php">Sair.</a>

        </div>
    </header>

    <div class="container" style="background-color: #ccc;">
        <div class="p-3">
            <h2>Agendamentos:</h2>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Agenda</th>
                    <th scope="col">Informaçoes</th>
                    <th scope="col">Status</th>
                    <th scope="col"> </th>

                </tr>
            </thead>
        </table>
        <div>
            <table class="table table-striped  table-hover table-dark" id="divAgendamentos">



            </table>

        </div>


    </div>
    
    <footer>
        <nave>

        </nave>
        <p>&copy; dvdsites.com.br</p>
    </footer>
</body>

</html>