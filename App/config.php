<?php

    use Rocharor\Sistema\Conexao;
    use Rocharor\Sistema\Sessao;
    use Rocharor\Sistema\Padrao;

    Sessao::abrirSessao();

    define('_INC_ROOT_',str_replace('\\','/',dirname(__DIR__)));
    define('_PUBLIC_','');
    define('_CONFIG_',_INC_ROOT_.'/App/Sistema/config/');
    define('_IMAGENS_',_INC_ROOT_.'/Public/images/');
    define('_VIEWS_', _INC_ROOT_.'/App/Modulos/Site/Views/');
    define('_VIEWS_ADMIN_', _INC_ROOT_.'/App/Modulos/Admin/Views/');

    $conn = new Conexao(_CONFIG_.'mysql.ini');
    $conn = $conn ->open();

    $loader = new Twig_Loader_Filesystem([_VIEWS_, _VIEWS_ADMIN_]);
    $twig = new Twig_Environment($loader);
