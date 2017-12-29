<?php
namespace Rocharor\Site\Controllers;

use Rocharor\Sistema\Controller;
use Rocharor\Site\Models\GaleriaModel;

class Galeria extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new GaleriaModel;
    }

    public function indexAction()
    {
        $arrFotos = $this->model->buscar('galeria',['status'=>1]);
        $dadosHome = $this->model->buscar('home');
        $variaveis = [
            'ativo3'=>'active',
            'msgTopo'=>$dadosHome[0]['texto'],
            'arrFotos'=>$arrFotos
        ];

        $this->view('galeria', $variaveis);
    }
}
