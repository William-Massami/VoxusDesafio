<?php 
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('conexao.php');
$usucodigo = $GET_['codigousu'];
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$anexo = $_POST['anexo'];
$db = mysql_select_db('DB_Voxus', $link);

 
  if($codigo == "" || $codigo == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo codigo deve ser preenchido');window.location.href='formularioedicao.html';</script>";
 
    }else{
        $query = "UPDATE .tab_task. SET CODIGO = $codigo, NOME = $nome, DESCRICAO = $descricao, ANEXO = $anexo WHERE CODIGO = $usucodigo";
        $insert = mysql_query($query,$link);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Cadastro incluído com sucesso!');window.location.href='formularioedicao.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível Incluir esse cadastro');window.location.href='formularioedicao.html'</script>";
          die();
        }
      }
    
    
    mysql_free_result($select);    
?>