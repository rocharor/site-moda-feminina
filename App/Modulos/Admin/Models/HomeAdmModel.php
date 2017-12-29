<?php
namespace Rocharor\Admin\Models;

use Rocharor\Sistema\Model;

class HomeAdmModel extends Model
{
    /**
     * Preparação para editar item
     * @param unknown $dados
     */
    public function alterarHome($dados)
    {
        $tabela = 'home';
        $arrValores = [
            'texto'=>$dados['topo_site']
        ];    
        $arrWhere = [
            'id'=> 1
        ];
        
        $retorno = $this->editar($tabela, $arrValores,$arrWhere);
        return $retorno;
    }    
}
