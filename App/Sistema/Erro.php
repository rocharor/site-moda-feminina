<?php
namespace Rocharor\Sistema;

class Erro
{

    public function erroAction()
    {
        global $twig;

        echo $twig->render('404.html');
        exit;
    }

}
