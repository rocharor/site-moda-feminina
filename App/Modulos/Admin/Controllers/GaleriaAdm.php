<?php
namespace Rocharor\Admin\Controllers;

use Rocharor\Admin\Models\GaleriaAdmModel;
use Rocharor\Sistema\Controller;
use Rocharor\Sistema\Padrao;

class GaleriaAdm extends Controller
{

    private $model;

    private $total_pagina = 5;

    public function __construct()
    {
        $logadoAdmin = $this->validaLogado();

        if ($logadoAdmin) {
            $this->model = new GaleriaAdmModel();
        } else {
            header("location:" . _PUBLIC_ . "/admin");
            die();
        }
    }

    /**
     * Direciona para a tela do admin ou login
     */
    public function indexAction($pg, $parametro)
    {
        $limit = Padrao::geraLimitPaginacao($pg, $this->total_pagina);

        // $arrDados = $this->model->buscaDados($limit);
        $arrDados = $this->model->buscar('galeria',[],['id'=>'DESC'],$limit);
        $arrTotalDados = $this->model->buscar('galeria');

        if ($parametro == 1) {
            $msg = 'Salvo com sucesso.';
            $class = 'alert-success';
        } elseif ($parametro == 2) {
            $msg = 'Erro ao salvar.';
            $class = 'alert-danger';
        } else {
            $msg = null;
            $class = '';
        }

        $variaveis = [
            'ativo2' => 'active',
            'msg' => $msg,
            'class' => $class,
            'pg' => $pg,
            'totalPg' => ceil(count($arrTotalDados) / $this->total_pagina),
            'arrDados' => $arrDados
        ];

        $this->view('galeriaAdm', $variaveis, 'admin');
    }

    /**
     * Método para inserir um novo item da Galeria
     */
    public function salvarGaleria()
    {
        $file = $_FILES['imagem_c'];
        $dados = $_POST;

        $fotoNome = date("Ymd_His") . '_' . $file['name'];
        $caminhoFoto = _IMAGENS_ . 'galeria/' . $fotoNome;

        if (move_uploaded_file($file['tmp_name'], $caminhoFoto)) {
            $foto_salva = true;
        } else {
            $foto_salva = false;
        }

        if ($foto_salva) {
            $dados['foto_nome'] = $fotoNome;
            $retorno = $this->model->inserirGaleria($dados);

            if ($retorno) {
                $param = 1;
            } else {
                $param = 2;
                unlink($caminhoFoto);
                die('1');
            }
        } else {
            $param = 2;
            die('2');
        }

        header("location:" . _PUBLIC_ . "/admin/galeria/1/" . $param);
        die();
    }

    /**
     * Método para editar item da Galeria
     */
    public function editarGaleria()
    {
        $file = $_FILES['imagemE'];
        $dados = $_POST;

        $fotoNome = date("Ymd_His") . '_' . $file['name'];
        $caminhoFoto = _IMAGENS_ . 'galeria/' . $fotoNome;

        $foto_salva = true;
        if ($file['error'] == 0) {
            if (! move_uploaded_file($file['tmp_name'], $caminhoFoto)) {
                $foto_salva = false;
            }
            $dados['nome_foto'] = $fotoNome;
        } else {
            $dados['nome_foto'] = $dados['foto_antiga'];
        }

        if ($foto_salva) {
            $retorno = $this->model->alterarGaleria($dados);
            if ($retorno) {
                $param = 1;
                if ($file['error'] == 0) {
                    $foto_antiga = _IMAGENS_ . 'galeria/' . $dados['foto_antiga'];
                    unlink($foto_antiga);
                }
            } else {
                $param = 2;
            }
        } else {
            $param = 2;
        }

        header("location:" . _PUBLIC_ . "/admin/galeria/1/" . $param);
        die();
    }

    /**
     * Método para deletar itens da galeria
     */
    public function deletarGaleria()
    {
        $id = $_POST['id'];
        $nome_foto = $_POST['nome_foto'];

        $retorno = $this->model->deletarGaleria($id);
        if ($retorno) {
            $caminho_foto = _IMAGENS_ . 'galeria/' . $nome_foto;
            unlink($caminho_foto);
            echo 1;
        } else {
            echo 2;
        }
        die();
    }
}
