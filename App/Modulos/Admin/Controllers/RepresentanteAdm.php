<?php
namespace Rocharor\Admin\Controllers;

use Rocharor\Sistema\Controller;
use Rocharor\Admin\Models\RepresentanteAdmModel;


class RepresentanteAdm extends Controller
{

    private $model;

    public function __construct()
    {
        $logadoAdmin = $this->validaLogado();

        if($logadoAdmin){
            $this->model = new RepresentanteAdmModel();
        }else{
            header("location:"._PUBLIC_."/admin");
            die();
        }

    }

    /**
     * Direciona para a tela do admin ou login
    */
    public function indexAction($pg,$parametro)
    {
        $arrDados = $this->model->buscar('representantes');

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
            'ativo3'=>'active',
            'msg'=>$msg,
            'class'=>$class,
            'pg'=>$pg,
            'totalPg'=>ceil(count($arrDados)/5),
            'arrDados'=>$arrDados
        ];

        $this->view('representanteAdm', $variaveis,'admin');
    }

    /**
     * Método para inserir um novo item da Galeria
     */
    public function salvarRepresentante()
    {
        $dados = $_POST;

        $retorno = $this->model->inserirRepresentante($dados);

        if($retorno){
            $param = 1;
        }else{
            $param = 2;
            unset($caminhoFoto);
        }


        header("location:"._PUBLIC_."/admin/representante/1/".$param);
        die();
    }

    /**
     * Método para editar item da Galeria
     */
    public function editarRepresentante()
    {
        $dados = $_POST;

        $retorno = $this->model->alterarRepresentante($dados);
        if($retorno){
            $param = 1;
        }else{
            $param = 2;
        }

        header("location:"._PUBLIC_."/admin/representante/1/".$param);
        die();
    }

    /**
     * Método para deletar itens da galeria
     */
    public function deletarRepresentante()
    {
        $id = $_POST['id'];

        $retorno = $this->model->deletarRepresentante($id);
        if($retorno){
            echo 1;
        }else{
            echo 2;
        }
        die();
    }

}
