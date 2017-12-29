<?php
namespace Rocharor\Admin\Controllers;

use Rocharor\Sistema\Controller;
use Rocharor\Sistema\Padrao;
use Rocharor\Admin\Models\HomeAdmModel;


class HomeAdm extends Controller
{

    private $model;

    public function __construct()
    {
        $logadoAdmin = $this->validaLogado();

        if($logadoAdmin){
            $this->model = new HomeAdmModel();
        }else{
            header("location:"._PUBLIC_."/admin");
            die();
        }
    }

    /**
     * Direciona para a tela do admin ou login
     */
    public function indexAction($parametro)
    {
        $arrDados = $this->model->buscar('home');

        if($parametro == 1){
            $msg = 'Salvo com sucesso.';
            $class = 'alert-success';
        }elseif($parametro == 2){
            $msg = 'Erro ao salvar.';
            $class = 'alert-danger';
        }else{
            $msg = null;
            $class = '';
        }

        $variaveis = [
            'ativo1'=>'active',
            'msg'=>$msg,
            'class'=>$class,
            'arrDados'=>$arrDados
        ];

        $this->view('homeAdm', $variaveis,'admin');
    }

    /**
     * Método para editar item da Galeria
     */
    public function editarHome()
    {
        $dados = $_POST;

        $retorno = $this->model->alterarHome($dados);

        if($retorno){
            $param = 1;
        }else{
            $param = 2;
        }

        header("location:"._PUBLIC_."/admin/home/".$param);
        die();
    }

    /**
     * Gera um relatorio com todos os e-mail do newsletter
     */
    public function geraRelatorio()
    {
    	$dados = $this->model->buscar('emails');
    	$email = [];
    	foreach($dados as $value){
    		$email[] = $value['email'];
    	}

    	if(count($email) > 0){
    		$emails[] = $email;
    		Padrao::geraCSV('csv_emails.csv',$emails);
    	}else{
    		echo "Não existe nenhum e-mail cadastrado";

    	}

    }
}
