<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('conexao.php'); 
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$anexo = $_POST['anexo'];
$db = mysql_select_db('DB_Voxus', $link);

$query_select = "SELECT CODIGO FROM tab_task WHERE CODIGO = '$codigo'";
$select = mysql_query($query_select, $link);
$array = mysql_fetch_array($select);
$logarray = $array['CODIGO'];
 
  if($codigo == "" || $codigo == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo codigo deve ser preenchido');window.location.href='formulario.html';</script>";
 
    }else{
      if($logarray == $codigo){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse codigo já existe');window.location.href='formulario.html';</script>";
        die();
 
      }else{
        $query = "INSERT INTO tab_task VALUES ('$codigo','$nome', '$descricao', '$anexo')";
        $insert = mysql_query($query,$link);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Cadastro incluído com sucesso!');window.location.href='formulario.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível Incluir esse cadastro');window.location.href='formulario.html'</script>";
          die();
        }
      }
    }
    
    mysql_free_result($select);    
?>