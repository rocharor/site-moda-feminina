<?php
namespace Rocharor\Admin\Controllers;

use Rocharor\Sistema\Controller;
use Rocharor\Sistema\Sessao;
use Rocharor\Admin\Models\LoginModel;


class LoginAdm extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new LoginModel();
    }

    /**
     * Direciona para a tela do admin ou login
    */    
    public function indexAction()
    {       
        $logadoAdmin = $this->validaLogado();

        if ($logadoAdmin) {
            $url = _PUBLIC_.'/admin/home';
            header("location:$url");
            die();            
        } else {
            if (empty($_POST)) {
                $variaveis = [
                    'msg'=>'',
                    'semMenu'=>true
                ];                                
            } else {
                $retorno = $this->model->validaLoginAdmin($_POST['login'], $_POST['senha']);
                
                if ($retorno) {
                    Sessao::setaSessao([
                        'logado' => $retorno
                    ]);
                    
                    $url = _PUBLIC_.'/admin/home';
                    header("location:$url");
                    die();
                } else {
                    $variaveis = [
                        'msg'=>'Usuário ou senha inválidos',
                        'semMenu'=>true
                    ];
                }               
            }    
            $this->view('loginAdm', $variaveis,'admin');             
        } 
    }
    
    public function deslogarAction()
    {
        Sessao::excluiSessao('shirleydantas');
        echo 1;
        die();
    }
    
}