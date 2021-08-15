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


// echo ($id_usuario);
// exit;
// echo $data;
// echo $hora;

?>


<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=pt-br&key=AIzaSyA6qDPshk3c3RuR3soH8pk6fF5vo4MQiSY" type="text/javascript"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link rel="stylesheet" href="../css/estilo_formulario.css">
    <script src="../js/mapa.js" type="text/javascript"></script>
    <script src="../js/app_formulario.js"></script>
    <!-- <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-4041533629194916" data-ad-slot="2215737180" data-ad-format="auto"></ins> -->
    <!-- <script> 
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script> -->
</head>

<body>
    <div class="container_u">
        <img id="img_log" src="../img/logo_site_360.jpeg" alt="Logo">


        <form id="distance_form" enctype="multipart/form-data" class="form-box">

            <div class="form-group">
                <label>Partida: </label>
                <input id="from_places" class="form-control" placeholder="Digite o endereço" />
                <input id="origin" type="hidden" name="origin" required />
            </div>

            <div class="form-group">
                <label>Destino: </label>
                <input id="to_places" class="form-control" placeholder="Digite o endereço" />
                <input id="destination" type="hidden" name="destination" required />
            </div>

            <input type="submit" value="Calcular" class="btn btn-primary" />
        </form>

        <!-- <div id="result" class="form-box">
             <ul class="list-group"> 
                 <li class="list-group-item d-flex justify-content-between align-items-center"> 
                            Distance In Mile :
                            <span id="in_mile" class="badge badge-primary badge-pill"></span>
                        </li> 
                 <li class="list-group-item d-flex justify-content-between align-items-center">
                    KM:
                    <span id='in_kilo' class="badge badge-primary badge-pill"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    TEMPO:
                    <span id="duration_text" class="badge badge-primary badge-pill"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    VALOR: R$
                    <span id="valor" class="badge badge-primary badge-pill"></span>
                </li>

            </ul> -->
        <!-- </div> -->
        <div>
            <form action="../api/api_agendamento.php" method="POST" enctype="multipart/form-data" class="form-box">

                <div>
                    <ul class="list-group">
                        <!-- <li class="list-group-item d-flex justify-content-between align-items-center"> 
                            Distance In Mile :
                            <span id="in_mile" class="badge badge-primary badge-pill"></span>
                        </li> -->
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            KM:
                            <span id='in_kilo' class="badge badge-primary badge-pill"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            TEMPO:
                            <span id="duration_text" class="badge badge-primary badge-pill"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            VALOR: R$
                            <span id="valor" class="badge badge-primary badge-pill"></span>
                        </li>


                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            DESTINO:
                            <span id="from" class="badge badge-primary badge-pill"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            CHEGADA:
                            <span id="to" class="badge badge-primary badge-pill"></span>
                        </li>
                        <br>
                        <div>
                            <div>
                                <input type="hidden" name="id_usuario" id="formUsuario" value="<?php echo $_SESSION['id_usuario']; ?>" />
                            </div>
                            <div>
                                <label for="id_motorista">Motorista: </label>
                                <select name="id_motorista" required>
                                    <option selected disabled>Selecione o motorista:</option>

                                    <?php
                                    foreach ($id_motorista as $output) {
                                        echo '<option value="' . $output['id_motorista'] . '">' . $output['motorista'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <input type="hidden" name="km" id="km">
                            </div>
                            <div>
                                <input type="hidden" name="valor" id="preco">
                            </div>
                            <div>
                                <input type="hidden" name="partida" id="partida">
                            </div>
                            <div>
                                <input type="hidden" name="destino" id="destino">
                            </div>

                            <div>
                                <label for="dia">Data: </label>
                                <input type="date" id="dia" name="dia" placeholder="dia" maxlength="13" required class="form-input">
                            </div>

                            <div>
                                <label for="horario">Horario: </label>
                                <select name="horario" required>
                                    <option selected disabled>Selecione o horario:</option>

                                    <?php
                                    foreach ($id_horarios as $output) {
                                        echo '<option value="' . $output['id_horarios'] . '">' . $output['horarios'] . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>

                </div>
                </ul>
                <div>
                    <input type="submit" value="Confirmar" class="form-btn">
                </div>
            </form>
        </div>
    </div>





</body>

</html>