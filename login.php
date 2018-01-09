<?php 
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    require_once('conexao.php');
    $login = $_POST['loginid'];
    $entrar = $_POST['entrar'];
    $senha = md5($_POST['senha']);
    $db = mysql_select_db('DB_Voxus', $link);
    if (isset($entrar)) {
             
        $verifica = mysql_query("SELECT * FROM tab_usuarios WHERE loginid = '$login' AND senhaid = '$senha'") or die("Erro ao selecionar" .mysql_error());
        if (mysql_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
            die();
        }else{
            echo"<script language='javascript' type='text/javascript'>alert('Bem Vindo usuário $login');window.location.href='formulario.html';</script>";
            die();
            }
            mysql_free_result($verifica);
        }
?>