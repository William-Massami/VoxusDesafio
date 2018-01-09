<?php
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    define('SERVIDOR', '127.0.0.1');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('BD_Voxus', 'BD_Voxus');
    define('tab_usuarios', 'tab_usuarios');
    define('tab_task', 'tab_task');
    $link = mysql_connect(SERVIDOR, USUARIO, SENHA) or die ('Falha na conexão: '.mysql_error());


    $cria_db = 'create database if not exists '.BD_Voxus;
    mysql_query($cria_db) or die ('Falha na criação do banco "'.BD_Voxus.'": '.mysql_error());
    mysql_select_db(BD_Voxus, $link) or die ('Falha na seleção do banco "'.BD_Voxus.'": '.mysql_error());
    //echo 'O banco "'.BD_Voxus.'" foi criado com sucesso!<br/>';
    
    
    $cria_tab_usuario = 'create table if not exists '.tab_usuarios.'
    (
        ID INT(5) not null auto_increment, 
        LOGINID VARCHAR(40) not null, 
        SENHAID VARCHAR(50) not null,
        PRIMARY KEY (ID)
    )';

    $cria_tab_task = 'create table if not exists '.tab_task.'
    (
        ID INT(5) NOT NULL AUTO_INCREMENT,
        CODIGO VARCHAR(10) NOT NULL,
        NOME VARCHAR(150) NOT NULL,
        DESCRICAO VARCHAR(200) NULL,
        ANEXO VARCHAR(200) NULL,
        PRIMARY KEY (ID)
    )';

    /*
    mysql_query($cria_tab_usuario) or die 
    ('Falha na criação da tabela "'.tab_usuarios.'": '.mysql_error());
    echo 'A tabela "'.tab_usuarios.'" foi criada com sucesso!<br/>';

    mysql_query($cria_tab_task) or die ('Falha na criação da tabela "'.tab_task.'": '.mysql_error());
    echo 'A tabela "'.tab_task.'" foi criada com sucesso!<br/>';
    */
    
?>