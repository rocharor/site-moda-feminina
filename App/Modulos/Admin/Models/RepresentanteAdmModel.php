<?php
namespace Rocharor\Admin\Models;

use Rocharor\Sistema\Model;

class RepresentanteAdmModel extends Model
{
    /**
     * Preparação para inserir novo item
     * @param unknown $dados
     * @param unknown $foto_nome
     */
    public function inserirRepresentante($dados)
    {
        $tabela = 'representantes';
        $arrValores = [
            'nome'=>$dados['nomeC'],
            'cidade'=>$dados['cidadeC'],            
            'status'=>$dados['btn_salvar']            
        ];
      
        $retorno = $this->inserir($tabela, $arrValores);
        
        return $retorno;
    }
    
    /**
     * Preparação para editar item
     * @param unknown $dados
     * @param unknown $foto_nome
     */
    public function alterarRepresentante($dados)
    {
        $tabela = 'representantes';
        $arrValores = [
            'nome'=>$dados['nomeE'],
            'cidade'=>$dados['cidadeE'],            
            'status'=>$dados['btn_salvar_editar']
        ];
        
        $arrWhere = ['id'=>$dados['id']];
        
        $retorno = $this->editar($tabela, $arrValores, $arrWhere);
    
        return $retorno;
    }
    
    /**
     * Preparação para editar item
     * @param unknown $dados
     * @param unknown $foto_nome
     */
    public function deletarRepresentante($id)
    {
        $tabela = 'representantes';
        $arrValores = [
            'id'=>$id
        ];
    
        $retorno = $this->deletar($tabela, $arrValores);
    
        return $retorno;
    }
}
