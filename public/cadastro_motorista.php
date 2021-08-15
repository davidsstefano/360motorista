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
        <div class="container_cm">
            <img id="img_logo" src="../img/logo_site_360.jpeg" alt="Logo">
            <div class="form-box">

                <form action="../api/api_cadastromotorista.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <h2>Cadastro</h2>
                    </div>
                    <div>
                        <label for="motorista">Digite o Nome: </label>
                        <input type="text" id="motorista" name="motorista" placeholder="Nome" maxlength="30" required class="form-input">
                    </div>
                    <div>
                        <label for="Carteira">Digite o numero da carteira: </label>
                        <input type="text" id="carteira" name="carteira" placeholder="Numero carteira" maxlength="11" required class="form-input">
                    </div>
                    <div>
                        <label for="Categoria">Digite a Categoria: </label>
                        <input type="text" id="categoria" name="categoria" placeholder="Categoria da carteira" maxlength="1" required class="form-input">
                    </div>
                    <div>
                        <label for="data_validade">Digite a data de validade: </label>
                        <input type="date" id="data_validade" name="data_validade" placeholder="data de validade" required class="form-input">
                    </div>
                    <div>
                        <label for="email_m">Digite o email: </label>
                        <input type="text" id="email" name="email" placeholder="Email" maxlength="40" required class="form-input">
                    </div>
                    <div>
                        <label for="telefone">Digite o telefone: </label>
                        <input type="text" id="telefone" name="telefone" placeholder="Telefone" maxlength="15" required class="form-input">
                    </div>
                    <div>
                        <label for="foto">Insira sua o foto: </label>
                        <input type="file" name="foto_m" placeholder="Foto" maxlength="45" required class="form-input">
                    </div>
                    <label for="senha">Digite o senha: </label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" maxlength="32" required class="form-input">

                    <div>
                        <label for="confirm_senha">confirme a senha: </label>
                        <input type="password" id="confirm_senha" name="confirm_senha" placeholder="confirme a senha" maxlength="32" required class="form-input" onkeyup='check();'>
                    </div>
                    <span id='message'></span><br>
                    <div>
                        <input type="submit" nome="cadastrar" value="cadastrar" class="form-btn">
                    </div>
                    <a href="logout.php">SAIR</a>
                </form>
            </div>
        </div>
    </main>

</body>

</html>