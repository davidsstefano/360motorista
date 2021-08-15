<?php
if ($_FILES && $_FILES['foto_c']) {
    $pastaUpload = '../img/';
    $nomeArquivo = $_FILES['foto_c']['name'];
    $arquivo = $pastaUpload . $nomeArquivo;
    $tmp = $_FILES['foto_c']['tmp_name'];


    // echo($nomeArquivo);

    if (move_uploaded_file($tmp, $arquivo)) {

        echo "Arquivo enviado com sucesso.";
    } else {
        echo "erro no upload.";
    }
}

?>
