<?php

    if(file_exists('mysql.ini')) {
        $dados = parse_ini_file('mysql.ini');
    }else{
        die('Dados do Banco não encontrados');        
    }
    
    $host = $dados['host'];
    $user = $dados['user'];
    $pass = $dados['pass'];
    $db = $dados['db'];
    
    $con = mysqli_connect($host, $user, $pass) or
    die('Não foi possível conectar');

    $query_database = "CREATE DATABASE " . $db;
    if(mysqli_query($con,$query_database)){
        echo "Banco de dados criado \n\r";
    }
    else {
        die("Erro ao criar banco de dados \n\r".mysqli_error($con));
    }

    $query_tabelas = [
    "home"=>
    "CREATE TABLE `shirley_dantas`.`home` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `texto` varchar(255) DEFAULT NULL,
      `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `data_alteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8",

    "galeria"=>
    "CREATE TABLE `galeria` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `titulo` varchar(100) DEFAULT NULL,
      `categoria` varchar(100) DEFAULT NULL,
      `descricao` varchar(255) DEFAULT NULL,
      `nome_foto` varchar(255) DEFAULT NULL,      
      `data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `data_alteracao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `status` int(11) DEFAULT '0',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8",

    "representantes"=>
    "CREATE TABLE `representantes` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` varchar(255) DEFAULT NULL,
      `cidade` varchar(255) DEFAULT NULL,
      `data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `data_alteracao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
      `status` int(11) DEFAULT '0',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8",

    "usuarios"=>
    "CREATE TABLE `usuarios` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `login` varchar(100) DEFAULT NULL,
      `senha` varchar(100) DEFAULT NULL,  
      `status` int(11) DEFAULT '0',  
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8",
        
    "emails"=>
    "CREATE TABLE `emails` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `email` varchar(255) DEFAULT NULL,    
      `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8"
       
    ];

    mysqli_select_db($con, $db);

    foreach($query_tabelas as $nm_tabela=>$query){
        if(mysqli_query($con,$query)){
            echo "Tabela " . $nm_tabela . " criada com sucesso. \n\r ";
        }
        else {
            die('Erro ao criar tabela'. $nm_tabela . mysqli_error($con));
        }
    }
    mysqli_close($con);

