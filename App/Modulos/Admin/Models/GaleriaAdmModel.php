<?php
namespace Rocharor\Admin\Models;

use Rocharor\Sistema\Model;

class GaleriaAdmModel extends Model
{
    /**
     * Preparação para inserir novo item
     * @param unknown $dados
     * @param unknown $foto_nome
     */
    public function inserirGaleria($dados)
    {
        $tabela = 'galeria';
        $arrValores = [
            'titulo'=>$dados['titulo_c'],
            'categoria'=>$dados['categoria_c'],
            'descricao'=>$dados['descricao_c'],
            'nome_foto'=>$dados['foto_nome'],
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
    public function alterarGaleria($dados)
    {
        $tabela = 'galeria';
        $arrValores = [
            'titulo'=>$dados['tituloE'],
            'categoria'=>$dados['categoriaE'],
            'descricao'=>$dados['descricaoE'],
            'nome_foto'=>$dados['nome_foto'],
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
    public function deletarGaleria($id)
    {
        $tabela = 'galeria';
        $arrValores = [
            'id'=>$id
        ];
    
        $retorno = $this->deletar($tabela, $arrValores);
    
        return $retorno;
    }
    
    /**
     * Método para trazer a quantidade necessária para a listagem conforme o LIMIT
     * @param unknown $pg
     * @return unknown
     */
    public function buscaDados($limit)
    {    	
    	$sql = "SELECT * FROM galeria LIMIT $limit";
    	$dados = $this->conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    	
    	return $dados;
    }
}
