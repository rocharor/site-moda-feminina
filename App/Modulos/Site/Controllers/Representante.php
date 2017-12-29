<?php
namespace Rocharor\Site\Controllers;

use Rocharor\Sistema\Controller;
use Rocharor\Site\Models\RepresentanteModel;

class Representante extends Controller
{

    private $model;
    
    public function __construct()
    {
        $this->model = new RepresentanteModel();
    }

    public function indexAction()
    {        
        $arrDados = $this->model->buscar('representantes');
        $dadosHome = $this->model->buscar('home');        
        
        $variaveis = [  
            'ativo4'=>'active',
            'msgTopo'=>$dadosHome[0]['texto'],
            'arrDados'=>$arrDados
        ];
        
        $this->view('representante', $variaveis);
    }
}
