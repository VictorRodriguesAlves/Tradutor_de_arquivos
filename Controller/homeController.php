<?php

class homeController {

    public function index()
    {
        require('View/home.php');
    }

    public function traduzir()
    {
        if (isset($_FILES['file']['tmp_name']) && !empty($_FILES['file']['tmp_name'])) {
            $file = fopen($_FILES['file']['tmp_name'], 'r');
            $conteudo = '';
            while (($line = fgets($file)) !== false) {
                $conteudo .= $line;
            }

            fclose($file);
            $trad = new Trad;
            $trad->index($conteudo);
        } else {
            echo "Nenhum arquivo foi enviado.";
            exit; 
        }
            

    }

}