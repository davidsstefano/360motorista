<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/index.js"></script>
    <link rel="stylesheet" href="../css/estilo_formulario.css">



    <title>App_corrida</title>
</head>

<body>

    <div class="container_login">
        <img id="img_logo" src="../img/logo_site_360.jpeg" alt="Logo">
        <section>
            <div>
                <form id="login" method="POST" enctype="multipart/form-data" class="form-box">
                    <h1>
                        Login
                    </h1>

                    <div>
                        <label for="email">Digite o email: </label>
                        <input type="email" id="email" name="email" placeholder="Email" maxlength="40" required class="form-input">
                    </div>
                    <div>
                        <label for="senha">Digite o senha: </label>
                        <input type="password" id="senha" name="senha" placeholder="Senha" maxlength="32" required class="form-input">
                    </div>
                    <div>
                        <input type="submit" value="Entrar" class="form-btn">
                    </div>
                    <a id="logout" href="logout.php">Sair.</a>
                </form>
            </div>
        </section>

    </div>



</body>

</html>