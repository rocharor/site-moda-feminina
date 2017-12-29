<?php
    namespace Rocharor\Sistema;

    class Sessao {

        public static function abrirSessao($nome='shirleydantas') {
            session_name($nome);
            session_start();
            return true;
        }

        /**
        * Recebe um array com as opções a serem setadas na sessão
        *
        */
        public static function setaSessao(){
            $parametros = func_get_args();

            foreach($parametros[0] as $key=>$value){

                $_SESSION['shirleydantas'][$key] = $value;
            }

            return true;

        }

        public static function pegaSessao(){
            $parametros = func_get_args();
            $dados = '';

            if(isset($_SESSION['shirleydantas'])){
                foreach($parametros as $value){
                    if(isset($_SESSION['shirleydantas'][$value])){
                        $dados = $_SESSION['shirleydantas'][$value];
                    }else{
                        return false;
                    }
                }
            }
            if(count($dados) > 0 )
                return $dados;
            else
                return false;
        }

        public static function excluiSessao($sessao){
            unset($_SESSION[$sessao]);
            self::setaSessao(['logado'=>0]);          
            return true;
        }

    }
