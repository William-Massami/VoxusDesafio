<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('conexao.php'); 
$login = $_POST['loginid'];
$senha = MD5($_POST['senha']);
$db = mysql_select_db('DB_Voxus', $link);
$query_select = "SELECT loginid FROM tab_usuarios WHERE loginid = '$login'";
$select = mysql_query($query_select, $link);
$array = mysql_fetch_array($select);
$logarray = $array['loginid'];
 
  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";
 
    }else{
      if($logarray == $login){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
        die();
 
      }else{
        $query = "INSERT INTO tab_usuarios (loginid, senhaid) VALUES ('$login','$senha')";
        $insert = mysql_query($query, $link);
        
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }
    mysql_free_result($select);
?>