<?php
if($_SESSION['conteudo']){
    // Criar arquivo temporário
    $tempFile = tmpfile();

    // Escrever conteúdo no arquivo temporário
    fwrite($tempFile, $_SESSION['conteudo']);

    // Obter o caminho do arquivo temporário
    $tempFilePath = stream_get_meta_data($tempFile)['uri'];

    // Definir o tipo MIME do arquivo
    $tipoMime = mime_content_type($tempFilePath);

    // Definir o nome do arquivo que será exibido para o usuário ao fazer o download
    $nomeArquivo = 'traduzido.txt';

    // Definir os cabeçalhos HTTP
    header("Content-Type: $tipoMime");
    header("Content-Disposition: attachment; filename=\"$nomeArquivo\"");

    // Enviar o conteúdo do arquivo temporário para o navegador do usuário
    rewind($tempFile);
    fpassthru($tempFile);

    // Excluir o arquivo temporário
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