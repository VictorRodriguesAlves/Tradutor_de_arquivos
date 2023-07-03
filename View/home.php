<?php
if($_SESSION['conteudo']){
    $tempFile = tmpfile();

    fwrite($tempFile, $_SESSION['conteudo']);

    $tempFilePath = stream_get_meta_data($tempFile)['uri'];

    $tipoMime = mime_content_type($tempFilePath);

    $nomeArquivo = 'traduzido.txt';

    header("Content-Type: $tipoMime");
    header("Content-Disposition: attachment; filename=\"$nomeArquivo\"");

    rewind($tempFile);
    fpassthru($tempFile);

    unlink($tempFilePath);
    unset($_SESSION['conteudo']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tradutor de arquivos</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>                     
<body>
    <div class="container">
        <form action="home/traduzir" method="POST" enctype="multipart/form-data">
            <h1>Tradutor de arquivos</h1>
            <br>
            <input type="file" name="file">
            <br><br>
            <button type="submit">traduzir</button>
        </form>
    </div>
</body>
</html>