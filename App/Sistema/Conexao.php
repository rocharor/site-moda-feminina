<?php
    namespace Rocharor\Sistema;

    class Conexao {

        private $host;
        private $port;
        private $name;
        private $user;
        private $pass;
        private $type;

        public function __construct($arquivo=false){

            if(file_exists($arquivo)) {
                $dados = parse_ini_file($arquivo);
            }else{
                echo 'Dados do Banco não encontrados';
                return false;
            }

            $this->host = $dados['host'];
            $this->port = $dados['port'];
            $this->name = $dados['db'];
            $this->user = $dados['user'];
            $this->pass = $dados['pass'];
            $this->type = $dados['type'];

        }

        /**
        * Faz a conexão com o banco de dados
        *
        * @param mixed $dados = informações do BD
        * @return {\PDO|\PDO_Object}
        */
        public function open(){

            switch($this->type) {
                case 'mysql':
                    $conn = new \PDO('mysql:host=' . $this->host . '; port=' . $this->port . '; dbname=' . $this->name, $this->user, $this->pass , array(
                        \PDO::ATTR_PERSISTENT => true ,
                        \PDO::ATTR_TIMEOUT => 30,
                        ));
                    break;                
            }

            $conn->exec("SET CHARACTER SET utf8");
            //$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
    }
