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
    <main>
        <div class="container_u">
            <img id="img_logo" src="../img/logo_site_360.jpeg" alt="Logo">
            <div class="form-box">

                <form action="../api/api_cadastrousuario.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <h2>Cadastro</h2>
                    </div>
                    <div>
                        <label for="nome_usuario">Digite o Nome: </label>
                        <input type="text" id="nome" name="nome" placeholder="Nome" maxlength="30" required class="form-input">
                    </div>
                    <div>
                        <label for="email">Digite o email: </label>
                        <input type="email" id="email" name="email" placeholder="Email" maxlength="40" required class="form-input">
                    </div>
                    <div>
                        <label for="telefone">Digite o telefone: </label>
                        <input type="tel" id="telefone" name="telefone" placeholder="Telefone" maxlength="13" required class="form-input">
                    </div>

                    <div>
                        <label for="senha">Digite o senha: </label>
                        <input type="password" id="senha" name="senha" placeholder="Senha" maxlength="32" required class="form-input" onkeyup='check();'>
                    </div>


                    <div>
                        <label for="confirm_senha">confirme a senha: </label>
                        <input type="password" id="confirm_senha" name="confirm_senha" placeholder="confirme a senha" maxlength="32" required class="form-input" onkeyup='check();'>
                    </div>

                    <!-- <div>    
                                <label for="foto">Insira sua o foto: </label>
                                <input type="file"  name="foto" placeholder="foto" maxlength="40" required class="form-input" >
                        </div> -->
                    <span id='message'></span>
                    <div>
                        <input type="submit" nome="cadastrar" value="cadastrar" class="form-btn">
                    </div><br>
                </form>
                <a href="logout.php">Já é cadastrado. Sair</a>
            </div>
        </div>
    </main>

</body>

</html>