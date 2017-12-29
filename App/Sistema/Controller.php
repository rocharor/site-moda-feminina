<?php
namespace Rocharor\Sistema;

use Rocharor\Sistema\Sessao;

abstract class Controller
{

    public function view($arquivo, $variaveis = [])
    {
        global $twig;

        $view = $arquivo . '.html';
        
        echo $twig->render($view, $variaveis);
        exit;
    }

    /**
     * Valida paginas que depende do login
     */
    public function validaLogado()
    {
        $logadoAdmin = Sessao::pegaSessao('logado');

        if($logadoAdmin){
            return true;
        }else{
            return false;
        }
    }
}
