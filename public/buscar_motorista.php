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

$sql = "SELECT * FROM horarios";
$id_horarios = $conn->select($sql, [])

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
    <script src="../js/app_formulario.js"></script>

    <title>Usuario</title>
</head>

<body>
    <header>
        <h1>
            App_Corrida
        </h1>
        <div>
            <a href="../api/logout.php">Sair!</a>
        </div>
        <nave>


            <ul>

            </ul>

        </nave>
    </header>
    <main>

        <section>
            <div class="container">
                <main>
                    <div class="form-box">

                        <form id="agendar" enctype="multipart/form-data">
                            <div>
                                <h2>Agendar Corrida</h2>
                            </div>
                            <div>
                                <label for="partida">Digite o local de partida: </label>
                                <input type="text" id="partida" name="partida" placeholder="partida" maxlength="40" required class="form-input">
                            </div>
                            <div>
                                <label for="destino">Digite o destino: </label>
                                <input type="text" id="destino" name="destino" placeholder="destino" maxlength="40" required class="form-input">
                            </div>
                            <div>
                                <label for="dia">Data: </label>
                                <input type="dia" id="dia" name="dia" placeholder="dia" maxlength="13" required class="form-input">
                            </div>

                            <div>
                                <label for="motorista">Motorista: </label>
                                <select name="motorista" required>
                                    <option selected disabled>Selecione o motorista:</option>

                                    <?php
                                    foreach ($id_motorista as $output) {
                                        echo '<option value="' . $output['id_motorista'] . '">' . $output['motorista'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div>
                                <label for="hora">Horario: </label>
                                <select name="horario" required>
                                    <option selected disabled>Selecione o horario:</option>

                                    <?php
                                    foreach ($id_horarios as $output) {
                                        echo '<option value="' . $output['id_horarios'] . '">' . $output['horarios'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <input type="submit" nome="cadastrar" value="cadastrar" class="form-btn">
                            </div>
                        </form>
                    </div>
                </main>
            </div>

        </section>

    </main>

    <footer>
        <nave>

        </nave>
        <p>&copy; dvdsites.com.br</p>
    </footer>
</body>

</html>