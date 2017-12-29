<?php
namespace Rocharor\Admin\Models;

use Rocharor\Sistema\Model;

class LoginModel extends Model
{    
    /**
     * Valida o login da area do ADMIN
     * @param unknown $login
     * @param unknown $senha
     * @return boolean
     */
    public function validaLoginAdmin($login, $senha)
    {
        $login = trim($login);
        $senha = trim(md5($senha));
        
        $arrUsuarios = $this->buscar('usuarios',['status'=>1]);
        
        foreach($arrUsuarios  as $usuario){
            if($login == $usuario['login'] && $senha == $usuario['senha']){
                return $usuario['id'];
            }
        }       
        
        return false;       
    }        

}
