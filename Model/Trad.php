<?php
use Stichoza\GoogleTranslate\GoogleTranslate;
class Trad {
    
    public function index($conteudo) 
    {
        $tr = new GoogleTranslate('pt-br');
        $conteudoTraduzido = $tr->translate($conteudo);
        $_SESSION['conteudo'] = $conteudoTraduzido;

        header('Location:'.BASE_URL.'home');
    
    }
}