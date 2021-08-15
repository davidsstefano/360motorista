<?php


//funcaao img usuarios.
if($_FILES && $_FILES['foto']) {
    $pastaUpload = '../img/';
    $nomeArquivo = $_FILES['foto']['name'];
    $arquivo = $pastaUpload . $nomeArquivo;
    $tmp = $_FILES['foto']['tmp_name'];

    // echo($nomeArquivo);

    if (move_uploaded_file($tmp,$arquivo)){

        echo "Arquivo enviado com sucesso.";

    }else{
        echo "erro no upload.";
    }
}
